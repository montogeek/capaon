<?php
class Cliente_Empresarial_Controller extends Base_Controller{

	protected $usuario;

	public function __construct()
	{
		parent::__construct();
		$this->usuario = Cliente::find(@Auth::user()->id_cliente);
		$this->filter('before','empresarial');;
	}

	// Carga la Vista de Agregar participante.
	public function action_inscripciones($curso_id)
	{
		$participantes = Participante::order_by('created_at','desc')->where('curso_id','=',$curso_id)->get();
		$curso = Curso::find($curso_id);
		return View::make('cliente.inscripcion_participantes')
							->with('usuario', $this->usuario)
							->with('curso_id',$curso_id)
							->with('titulo','Inscribir participantes')
							->with('curso',$curso)
							->with('participantes',$participantes);
	}

	// Agrega un participante
	public function action_inscripcionParticipante($curso_id){
		$curso = Curso::find($curso_id);
		$datos = Input::get();
		$datos = array(
			'cliente_id' => $this->usuario->id, 
			'curso_id' => $curso_id) + $datos;
		$reglas = array(
				'identificacion' => 'required|numeric',
				'nombre' => 'required|alpha',
				'apellido' => 'required|alpha',
				'email' => 'required|email',
				'cel_tel' => 'required|numeric',
			);
		$validacion = Validator::make($datos, $reglas);
		if($validacion->passes())
		{
			$participante = new Participante($datos);
			$participante->save();
			return Redirect::to_route('participantes',array($curso_id))->with('correcto', true);
		}
		else
		{
			return Redirect::to_route('participantes',array($curso->id))->with_errors($validacion)->with_input();
		}
	}

	// Cargar vista peticiones
	public function action_peticiones($curso_id)
	{
		$curso = Curso::find($curso_id);
		$datos = array(
				'mensaje' => '',
				'cupos' => 0,
				'nombre_curso' => $curso->nombre, 
				'ambito' => $curso->ambito, 
				'resumen' => $curso->resumen,
				'objetivo' => $curso->objetivo,
				'justificacion' => $curso->justificacion,
				'costo' => $curso->costo,
			);
		$solicitud = new Solicitudes($datos);
		//Con esto me aseguro de que el valor a escribir en la sesion sea siemproe algo vacio al apsar por aca
		$participantes = array();
		//Escribo en la sesion el par de mugres estas!! Con el fin de viajar con ellas por todo lado
		Session::put('solicitud', $solicitud);
		Session::put('participantes',$participantes);\
		Session::put('cupos_pedidos', 0);
		return View::make('cliente.peticion_cupo_empresarial')
							->with('curso_id',$curso_id)
							->with('usuario',$this->usuario)
							->with('curso',$curso)
							->with('titulo','Petición de cupos')
							->with('participantes',$participantes)
							->with('cupos_pedidos', 0)
							->with('correcto',TRUE);
	}

	public function action_agregarparticipante()
	{
		$participante = Input::except('curso_id');
		$curso_id = Input::get('curso_id');
		$curso = Curso::find($curso_id);
		$participantes = Session::get('participantes');
		$cupos_pedidos = Session::get('cupos_pedidos');

		$datos = Input::get();
		$reglas = array(
				'identificacion' => 'required|numeric',
				'nombre' => 'required|alpha',
				'apellido' => 'required|alpha',
				'email' => 'required|email',
				'cel_tel' => 'required|numeric',
			);
		$validacion = Validator::make($datos, $reglas);
		if($validacion->passes())
		{
			//Pregunto si ya esta en la sesion el participante del Input para evitar agragar duplicados 
			//estripando f5!!!
			if(!in_array($participante, $participantes, true)){
				$participantes[] = $participante;
				$cupos_pedidos++;
			} 
			//Le hago un append al array de participantes con participante, Asi lo agrego como un array!!!
			//Reescribo la sesion con el array de arrays que forme arriba!
			Session::put('participantes',$participantes);
			Session::put('cupos_pedidos',$cupos_pedidos);
			Session::forget('errors');
			return View::make('cliente.peticion_cupo_empresarial')
								->with('curso_id',$curso_id)
								->with('usuario',$this->usuario)
								->with('curso',$curso)
								->with('titulo','Petición de cupos')
								->with('participantes',$participantes)
								->with('correcto',TRUE)
								->with('cupos_pedidos',Session::get('cupos_pedidos'));
		}
		else
		{
			Session::put('participantes',$participantes);
			Session::put('cupos_pedidos',$cupos_pedidos);
			Session::put('errors',$validacion->errors);
			Input::flash();
			return View::make('cliente.peticion_cupo_empresarial')
							->with('correcto',FALSE)
							->with('participantes',$participantes)
							->with('cupos_pedidos',$cupos_pedidos)
							->with('curso_id',$curso_id)
							->with('usuario',$this->usuario)
							->with('curso',$curso)
							->with('titulo','Petición de cupos');
		}
		
	}

	// Manda la peticion
	public function action_envioPeticion($curso_id)
	{
		//LOGICA PENDEJA ACA!!
		$curso = Curso::find($curso_id);
		$datos_solicitud = Input::get();
		$participantes = Session::get('participantes');
		$solicitud = Session::get('solicitud');
		$solicitud->cupos = $datos_solicitud['cupos'];
		$solicitud->mensaje = $datos_solicitud['mensaje'];
		$solicitud->save();
		foreach ($participantes as $participante) {
			$datos_participante = array(
					'id_solicitud' => $solicitud->id,
					'id_cliente' => $this->usuario->id,
					'identificacion' => $participante['identificacion'],
					'nombre' => $participante['nombre'],
					'apellido' => $participante['apellido'],
					'email' => $participante['email'],
					'cel_tel' => $participante['cel_tel'],
				);
			$participates_espera = new ParticipanteEspera($datos_participante);
			$participates_espera->save();
		}
		Session::put('cupos_pedidos',NULL);
		Session::put('participantes',NULL);
		Session::put('solicitud',NULL);
		return Redirect::to('cliente/cursos')->with('cupo_correcto',$curso->nombre);
	}
}
