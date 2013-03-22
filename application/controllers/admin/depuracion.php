<?php

/**
 * Depuracion de Listas de Clientes potencialess
 */
class Admin_Depuracion_Controller extends Base_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'administrador');
	}

	public function action_index(){

		$usuario = Auth::user()->cliente()->first();
		$clientesI = Cliente::where('potencial','=', 'si')->where('id_tipo_usuario', '=', '2')->get(); //Obtiene la consulta de clientes potenciales e individuales
		$clientesE = Cliente::where('potencial','=', 'si')->where('id_tipo_usuario', '=', '3')->get(); // obtiene la consulta de clientes potenciales y empresariales
		//var_dump($clientes->get());
		return View::make('admin.depuracion')->with('usuario', $usuario)->with('clientesI', $clientesI)->with('clientesE', $clientesE)->with('activo','clientes')->with('titulo','Depuración de Clientes');
	}

}