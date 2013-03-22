<?php
/**
 * Contactar
 */
	class Contactar_Controller extends Base_Controller{

		public function __construct(){
			parent::__construct();
		}

		public function action_index(){

		}

		public function action_enviar(){

			//dd(Input::except(array('_wysihtml5_mode')));
			
			$datos = Input::except(array('_wysihtml5_mode'));
			$reglas = array(
				'nombre' => 'required|min:5|max:50',
				'email' => 'required|email',
				'asunto' => 'required|min:10|max:20',
				'mensaje' => 'required|max:200'
			);
			$mensajes  = array(
				'required' => ':attribute es requerido',
				'min' => 'El :attribute debe ser mayor a :min',
				'max' => 'El :attribute debe ser menor a :max',
				'email' => 'El campo :attribute debe ser un correo electronico!'
				);
			$validacion = Validator::make($datos, $reglas, $mensajes);
			if($validacion->fails()){
				return Redirect::to('contactar')->with_errors($validacion);
			}
			else{
				Bundle::start('swiftmailer');
				$mailer = IoC::resolve('mailer');
				$message = Swift_Message::newInstance($datos['asunto'])
					->setFrom(array($datos['email']=>$datos['nombre']))
					->setTo(array('paula.utp@gmail.com'=>'Administrador'))
					->setBody($datos['mensaje'],'text/html');
				$mailer->send($message);
				$mailer = IoC::resolve('mailer');
				return Redirect::to('contactar')->with("correcto",true);
			}

		}

	}
?>