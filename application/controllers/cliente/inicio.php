<?php



class Cliente_Inicio_Controller extends Base_Controller{



	protected $usuario;



	public function __construct()

	{

		parent::__construct();

		$this->usuario = Cliente::find(Auth::user()->id_cliente);

		$this->filter('before','cliente');

	}



	public function action_index()

	{

		$usuario = Cliente::find(Auth::user()->id_cliente);

		return View::make('cliente.inicio')->with('usuario',$usuario)->with('activo','inicio')->with('titulo','Inicio');

	}



	public function action_matricular()

	{

		$curso_id = Input::get('curso_id');

		$codigoM = Input::get('codigo');

		$participante = Participante::where('curso_id', '=', $curso_id)->where('cliente_id','=',$this->usuario->id)->first();

		if($codigoM == '123456'){

			$participante->estado = 1;

			$participante->save();

			return Redirect::to('cliente/cursos/inscritos')->with('usuario', $this->usuario)->with('correcto', 'Curso matriculado! Yeahh!');

		}

		else{

			return Redirect::to('cliente/cursos/inscritos')->with('usuario', $this->usuario)->with('incorrecto', 'Opps! Código Incorrecto! :P');

		}

	}

}