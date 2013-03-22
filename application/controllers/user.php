<?php

/**
 * Encargado del inicio de sesión.
 */
class User_Controller extends Base_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function action_index()
	{

	}

	/**
	 * Comprueba los datos de inicio de sesión.
	 * Si son correctos va a Admin.
	 * Si no, regresa a la vista mostrando un error.
	 */
	public function action_login()
	{
		$userinfo = array(
        	'username' => Input::get('usuario'),
        	'password' => Input::get('contrasena')
	    ); //Datos del login.
	    if (Auth::attempt($userinfo)) // Intenta comprobar si los datos son correctos.
	    {
	    	if(Auth::user()->id_tipo_usuario == 1) 
	    	{
        		return Redirect::to('admin/inicio'); // Si son correctos a Admin.
        	}
			else
			{
				return Redirect::to('cliente/inicio');
	    	}
	    }
	    else
	    {
	        return Redirect::to('login')->with('login_errors', true); // Si no, regresa a la vista mostran un error.
	    }
	}

	public function action_recordar()
	{
		$codigo = Hash::make(Input::get('usuario'));
		$user = User::select(array('id','nombre_usuario','id_cliente'))->where('nombre_usuario','=',Input::get('usuario'))->get();
		$cliente = Cliente::find($user[0]->id_cliente);
		$usuario = User::find($user[0]->id);
		$usuario->recordar = $codigo;
		$usuario->save();

		$mensaje = View::make('email')->with('recordar',$codigo);
		$mensaje = $mensaje->render();
		Bundle::start('swiftmailer');
		$mailer = IoC::resolve('mailer');
		$message = Swift_Message::newInstance('CAPAON - Recordar Contraseña')
			->setFrom(array('montoya.azul@gmail.com'=>'Administrador'))
			->setTo(array($user[0]->nombre_usuario=>$cliente->nombre))
			->setBody($mensaje,'text/html');
		$mailer->send($message);
		$mailer = IoC::resolve('mailer');
		return Redirect::to('login')->with("email_enviado",'Se te ha enviado un correo con las instrucciones para cambiar tu contraseña.');
	}

	public function action_restablecer()
	{
		$contrasenas = Input::except(array('id','codigo'));
		$reglas = array(
				'contrasena' => 'required', 
				'confirmacion_contrasena' => 'required|same:contrasena'
			);
		$validacion = Validator::make($contrasenas, $reglas);

		if($validacion->passes())
		{
			$usuario = User::find(Input::get('id'));
			$usuario->contrasena = Hash::make(Input::get('contrasena'));
			$usuario->recordar = '';
			$usuario->save();
			return Redirect::to('login')->with('contrasena_cambiada',"Contraseña actualizada correctamente.\nAhora puedes iniciar sesión");
		}
		else
		{
			return Redirect::to('recordar/'.Input::get('codigo'))->with_errors($validacion)->with_input();
		}
	}
}