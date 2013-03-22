<?php



class Cliente_Cursos_Controller extends Base_Controller{



	protected $usuario;



	public function __construct()

	{

		parent::__construct();

		$this->usuario = Cliente::find(@Auth::user()->id_cliente);

		$this->filter('before','cliente');

	}



	/**
	 * Carga la vista de Cursos Disponibles.
	 */

	public function action_index()

	{

		$cursos_disponibles = Curso::select(array('id','nombre','resumen','ambito','estado'))->get();

		$ambitos = Curso::select(array('ambito'))->group_by('ambito')->get();

		return View::make('cliente.cursos_disponibles')

					->with('usuario',$this->usuario)

					->with('activo','disponibles')

					->with('titulo','Cursos Disponibles')

					->with('cursos',$cursos_disponibles)

					->with('ambitos',$ambitos);

	}



	public function action_inscritos()

	{

		$participantes = Participante::where('estado','=',0)->where('cliente_id','=',$this->usuario->id)->get();

		$ids = array('0' => 0,);

		foreach ($participantes as $participante) {

			$ids = $ids+array($participante->curso_id => $participante->curso_id);

		}

		$cursos = Cliente::find($this->usuario->id)

							->curso()

							->select(array('cursos.nombre','resumen','cursos.id'))

							->where_in('cursos.id', $ids)

							->group_by('id')

							->get();

							

		return View::make('cliente.cursos_inscritos')

					->with('usuario',$this->usuario)

					->with('cursos',$cursos)

					->with('titulo','Cursos Inscritos')

					->with('activo','inscritos');

	}



	public function action_detallado($id)

	{

		$info_curso = Curso::find($id);

		$conferencista = Curso::find($id)->conferencista()->get();

		$participante = Participante::where('curso_id','=',$id)->where('cliente_id','=',$this->usuario->id)->get();

		$inscrito = (empty($participante)) ? FALSE : TRUE;

		return View::make('cliente.cursos_detallado')

						->with('usuario',$this->usuario)

						->with('curso',$info_curso)

						->with('conferencista',$conferencista)

						->with('titulo',$info_curso->nombre)

						->with('inscrito',$inscrito);

	}

}