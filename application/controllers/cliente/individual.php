<?php



class Cliente_Individual_Controller extends Base_Controller {



	protected $usuario;



	public function __construct()

	{

		parent::__construct();

		$this->usuario = Cliente::find(Auth::user()->id_cliente);

		$this->filter('before','individual');

	}



	// Inscribe a un cliente individual

	public function action_inscripcion($id_curso)

	{

		$curso = Curso::find($id_curso);

		$datos = array(

			'curso_id' => $id_curso,

			'cliente_id' => $this->usuario->id,

			'identificacion' => $this->usuario->identificacion,

			'nombre' => $this->usuario->nombre,

			'apellido' => $this->usuario->apellido_naturaleza,

			'email' => $this->usuario->email,

			'cel_tel' => $this->usuario->cel_fax,

			'estado' => 0,

			);

		// $update['cupo'] = $curso->cupo+1;

		// if($update['cupo'] == 30) $update['estado'] = 0;

		// Curso::update($id_curso, $update);

		$participante = new Participante($datos);

		$participante->save();

		return Redirect::to('cliente/cursos')->with('correcto', true)->with('nombre', $curso->nombre);



	}



	// Carga la vista de petición de cliente individual

	public function action_peticion($id)

	{	

		$curso = Curso::find($id);

		return View::make('cliente.peticion_cupo')->with('usuario',$this->usuario)->with('curso_id',$id)->with('titulo','Petición de cupo')->with('curso',$curso);

	}



	public function action_cupo($curso_id)

	{

		$curso = Curso::find($curso_id);

		$datos = Input::only('mensaje');

		$datos += array(

			'nombre_curso' => $curso->nombre, 

			'ambito' => $curso->ambito, 

			'resumen' => $curso->resumen,

			'objetivo' => $curso->objetivo,

			'justificacion' => $curso->justificacion,

			'costo' => $curso->costo

			);

		

		$solicitud = new Solicitudes($datos);

		$solicitud->save();

		$datosP = array(

			'id_solicitud' => $solicitud->id,

			'id_cliente' => $this->usuario->id,

			'identificacion' => $this->usuario->identificacion,

			'nombre' => $this->usuario->nombre,

			'apellido' => $this->usuario->apellido_naturaleza,

			'email' => $this->usuario->email,

			'cel_tel' => $this->usuario->cel_fax

			);



		ParticipanteEspera::insert($datosP);

		return Redirect::to('cliente/cursos')->with('cupo_correcto',$curso->nombre);

	}

}