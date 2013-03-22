<?php

/**
 * Gestión de los cursos.
 */
class Admin_Curso_Controller extends Base_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->filter('before','administrador');	
	}

	/**
	 * Carga la vista de inicio de los cursos.
	 */
	public function action_index()
	{
		$usuario = Auth::user()->cliente()->first();
		return View::make('curso.index')->with('usuario',$usuario)->with('activo','cursos')->with('titulo','Cursos');
	}

	/**
	 * Carga la vista para Crear un curso.
	 */
	public function action_crear()
	{
		$usuario = Auth::user()->cliente()->first();
		$conferencistas = Conferencista::all();
		return View::make('curso.crear')
					->with('usuario',$usuario)
					->with('conferencistas',$conferencistas)
					->with('titulo','Crear curso')
					->with('activo','crear');
	}

	/**
	 * Guarda un nuevo curso en la base de datos.
	 */
	public function action_nuevo()
	{
		$usuario = Auth::user()->cliente()->first();
		$datos = Input::only(array('nombre','resumen','objetivo','justificacion',
					'contenido','ambito','inicio_ins','fin_ins','inicio_curso','fin_curso','costo','estado')); 
					//Se excluye del Input a dos campos: 
					// _wysihtml5_mode que lo añade el editor bonito no sé para que y 
					// conferencista porque no es un campo en la base de datos.
		$reglas = array(
			'nombre' => 'required|min:5|max:50',
			'resumen' => 'required',
			'objetivo' => 'required',
			'justificacion' => 'required',
			'contenido' => 'required',
			'ambito' => 'min:5|max:30',
			'inicio_ins' => 'required',
			'fin_ins' => 'required',
			'inicio_curso' => 'required',
			'fin_curso' => 'required',
			//'cupo' => 'required|numeric',
			'costo' => 'required|numeric',
			); //Defiición de reglas.
		$validation = Validator::make($datos, $reglas); //Se hace la validación.
		if($validation->passes()) // Pensemos positivo, si la validación sale bien.
		{
			$conferencistas = Conferencista::all();
			$curso = new Curso($datos); //Creo un Objeto Curso con los datos del Input.
			$curso->save();
			foreach ($conferencistas as $conferencista) {
				if(Input::get('conferencista'.$conferencista->id) != null)
					Conferencistas::insert(array('conferencista_id' => $conferencista->id, 'curso_id' => $curso->id));
			}
			return Redirect::to('admin/curso')->with('correcto',true)->with('activo','cursos');;
		}
		else{
			return Redirect::to('admin/curso/crear')->with('usuario',$usuario)->with_errors($validation)->with_input()->with('activo','cursos');; 
			//Redirige a la misma vista con el objeto Usuario, Con los errores de la validación y con los datos que el usuario ingreso.
		}
	}

	/**
	 * Mostrar la lista de cursos.
	 */
	public function action_mostrar()
	{
		$usuario = Auth::user()->cliente()->first();
		$cursos = Curso::all(); //Obtengo todos los cursos.
		return View::make('curso.mostrar')
					->with('usuario',$usuario)
					->with('cursos',$cursos)
					->with('titulo','Listado de cursos')
					->with('activo','mostrar');
	}

	public function action_mostrarjson()
	{
		$cursos = Curso::all(); //Obtengo todos los cursos.
		$todos;
		foreach ($cursos as $curso) {
			$arry = $curso->to_array();
			//var_dump($arry['estado']);
			if($arry['estado'] == 1){
				$arry['est'] = "Abierto";
			}
			elseif($arry['estado'] == 0){
				$arry['est'] = "Cerrado";
			}
			else{
				$arry['est'] = "Cancelado";
			}
			//$arry['est'] = ($arry['estado'] == '1') ? "Abierto" : ($arry['estado'] == '0') ? "Cerrado" : "Cancelado";
			//var_dump($arry['est']);
			//$arry['acciones'] = "<a href="."{{ URL::base() }}/admin/curso/editar/".{{ $curso['id'] }}."><i class="."icon-pencil"."></i></a><a href="."{{ URL::base() }}/admin/curso/eliminar/".{{ $curso['id'] }}" role="button" data-toggle="modal" class="eliminar"><i class="icon-remove"></i></a>";
			// // {{ $curso['id'] }}."><i class="."icon-pencil"."></i></a><a href="."{{ URL::base() }}/admin/curso/eliminar/".{{ $curso['id'] }}" role="button" data-toggle="modal" class="eliminar"><i class="icon-remove"></i></a>";
			//$arry['acciones'] = HTML::link_to_action('admin/curso/editar/'.$arry['id'],'Editar');
			$arry['acciones'] = HTML::link_to_action('admin/curso/editar/'.$arry['id'],'Editar')." ".HTML::link_to_action('admin/curso/eliminar/'.$arry['id'],'Eliminar',array(),array('class'=>'eliminar'));
			$todos[] = $arry;

		}
		return Response::json($todos);
	}

	/**
	 * Carga la vista de edición de un Curso.
	 */
	public function action_editar($id)
	{
		$usuario = Auth::user()->cliente()->first();
		$curso = Curso::find($id); // Encuentro el curso con el ID enviado.
		$conferencistas_in = Curso::find($id)->conferencista()->get();
		$args = array(0 => 0);
		foreach ($conferencistas_in as $conf) {
			$args = $args + array($conf->id => $conf->id);
		}
		$conferencistas_out = Conferencista::Where_not_in('id', $args)->get();
		return View::make('curso.editar')
					->with('curso',$curso)
					->with('usuario',$usuario)
					->with('conferencistas_in',$conferencistas_in)
					->with('conferencistas_out',$conferencistas_out)
					->with('titulo','Editar Curso')
					->with('activo','cursos');
	}

	/**
	 * Actualiza un curso y también el conferencista asignado.
	 * No funciona correctamente :(
	 */
	public function action_actualizar()
	{
		$usuario = Auth::user()->cliente()->first();
		$curso = Curso::update(Input::get('id'), Input::only(array('nombre','resumen','objetivo','justificacion',
					'contenido','ambito','inicio_ins','fin_ins','inicio_curso','fin_curso','costo','estado')));//Guardo el curso.
		$conferencistas = Conferencista::all();
		foreach ($conferencistas as $conferencista) {
			if(Curso::find(Input::get('id'))->conferencista()->having("id","=", $conferencista->id)->get() != null){
				if(Input::get('conferencista'.$conferencista->id) == null)
					Conferencistas::where('conferencista_id', '=', $conferencista->id)->where('curso_id', '=',Input::get('id'))->delete();
			}
			else{
				if(Input::get('conferencista'.$conferencista->id) != null)
					Conferencistas::insert(array('conferencista_id' => $conferencista->id, 'curso_id' => Input::get('id')));
			}
		}
		return Redirect::to('admin/curso/mostrar')->with('correcto',true)->with('valor', 'actualizado')->with('titulo','Actualizar curso')->with('activo','cursos');;
	}

	public function action_eliminar($id)
	{
		$usuario = Auth::user()->cliente()->first();
		$curso = Curso::find($id);
		$curso->delete();
		return Redirect::to('admin/curso/mostrar') -> with('correcto', true)->with('valor', 'eliminado')->with('titulo','Cursos')->with('activo','cursos');;
	}

	/**
	 * Carga la vista de inicio de los conferencistas.
	 */
	public function action_conferencista()
	{
		$usuario = Auth::user()->cliente()->first();
		return View::make('curso.conferencista')
					->with('usuario',$usuario)
					->with('titulo','Agregar conferencista')
					->with('activo','conferencista');
	}

	/**
	 * Guarda un nuevo conferencista en la base de datos.
	 */
	public function action_nuevoConferencista()
	{
		$usuario = Auth::user()->cliente()->first();;
		$datos = Input::except('_wysihtml5_mode');
		$datos['enlace'] = 'http://'.$datos['enlace'];
		$reglas = array(
			'nombre' => 'required|min:5|max:50',
			'apellido' => 'required',
			'titulo' => 'required',
			'enlace' => 'required',
			'info_conferencista' => 'required'
			); //Defiición de reglas.
		$validation = Validator::make($datos, $reglas);
		if($validation->passes()){
			Conferencista::insert($datos);
			return Redirect::to('admin/curso')->with('usuario',$usuario)->with('correctos', false)->with('valor', 'Conferencista');
		}
		return Redirect::to('admin/curso/conferencista')->with_errors($validation)->with_input(); 
	}
}

