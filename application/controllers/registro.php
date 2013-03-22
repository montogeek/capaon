<?php



class Registro_Controller extends Base_Controller{



	public function __construct(){

		parent::__construct();

	}



	public function action_index()

	{

		return View::make('registro.inicio')->with('titulo','Registro')->with('activo','registro');

	}



	public function action_registro()

	{



		$tipo = Input::get('tipo');

		if($tipo == 2){

			return Redirect::to('registro/individual');

		}

		else{

			return Redirect::to('registro/empresarial');

		}

	}



	public function action_individual()

	{

		$datos = Input::except(array('confirmacion_contrasena','contrasena'));

		$contrasenas = Input::only(array('confirmacion_contrasena','contrasena'));

		$usuario = array();

		$usuarios = Input::only('email');

		$usuario['nombre_usuario'] = $usuarios['email'];

		$usuarios = Input::only('contrasena');

		$usuario['contrasena'] = Hash::make($usuarios['contrasena']);

		$usuarios = Input::only('id_tipo_usuario');

		$usuario['id_tipo_usuario'] = $usuarios['id_tipo_usuario'];





		$reglas = array(

				'identificacion' => 'required|numeric|unique:clientes,identificacion',

				'nombre' => 'required|alpha',

				'apellido_naturaleza' => 'required|alpha',

				'direccion' => 'required',

				'telefono' => 'required|numeric',

				'cel_fax' => 'required|numeric',

				'email' => 'required|email|unique:usuarios,nombre_usuario',

				'titulo' => 'required',

				'contrasena' => 'required',

				'confirmacion_contrasena' => 'same:contrasena',

			);

		$validacion = Validator::make($datos+$contrasenas, $reglas);



		if($validacion->passes())

		{


			$cliente = new Cliente($datos);

			$cliente->save();



			$usuario['id_cliente'] = $cliente->id;

			$usuario = new User($usuario);

			$usuario->save();



			return Redirect::to('login')->with('registro_correcto',TRUE);

		}

		else

		{

			return Redirect::to('registro/individual')->with_errors($validacion)->with_input();

		}



	}



	public function action_empresarial()

	{

		$datos_empresa = Input::only(array('identificacion','nombre','apellido_naturaleza','direccion','email','telefono','cel_fax','titulo','id_tipo_usuario','potencial'));

		$datos_usuario = Input::only(array('email','contrasena','confirmacion_contrasena','id_tipo_usuario'));

		$datos_representante = Input::only(array('nombre_r','apellido_r','telefono_r','email_r','direccion_r'));



		$reglas = array(

				'email' => 'required|email',

				'contrasena' => 'required',

				'confirmacion_contrasena' => 'required',

				'identificacion' => 'required|numeric',

				'nombre' => 'required|alpha',

				'apellido_naturaleza' => 'required|alpha',

				'direccion' => 'required',

				'telefono' => 'required|numeric',

				'cel_fax' => 'required|numeric',

				'titulo' => 'required',

				'nombre_r' => 'required',

				'apellido_r' => 'required',

				'telefono_r' => 'required',

				'email_r' => 'required|email',

				'direccion_r' => 'required',

			);



		$validacion = Validator::make($datos_usuario+$datos_empresa+$datos_representante, $reglas);



		if($validacion->passes())

		{

			$representante['nombre'] = $datos_representante['nombre_r'];

			$representante['apellido'] = $datos_representante['apellido_r'];

			$representante['telefono'] = $datos_representante['telefono_r'];

			$representante['email'] = $datos_representante['email_r'];

			$representante['direccion'] = $datos_representante['direccion_r'];



			$representante_guardar = new Representante($representante);

			$representante_guardar->save();



			$datos_empresa['id_representante'] = $representante_guardar->id;

			$empresa = new Cliente($datos_empresa);

			$empresa->save();



			$usuario['nombre_usuario'] = $datos_usuario['email'];

			$usuario['contrasena'] = Hash::make($datos_usuario['contrasena']);

			$usuario['id_tipo_usuario'] = $datos_usuario['id_tipo_usuario'];

			$usuario['id_cliente'] = $empresa->id;



			$usuario = new User($usuario);

			$usuario->save();



			return Redirect::to('login')->with('registro_correcto',TRUE);

		}

		else

		{

			return Redirect::to('registro/empresarial')->with_errors($validacion)->with_input();	

		}

	}

}