<?php

/**
 * Encargado de la pantalla de inicio de sesión.
 * FALTA FILTRARLO PARA QUE SOLO SEA ACCESIBLE SI EL USUARIO ESTÁ AUTENTIFICADO.
 */
class Admin_Inicio_Controller extends Base_Controller{

	private $usuario;

	public function __construct()
	{
		parent::__construct();
		$this->usuario = Cliente::find(Auth::user()->id_cliente);
		$this->filter('before','administrador');
	}

	/**
	 * Carga la vista de inicio del Administrador con el objeto Usuario autentificado.
	 */
	public function action_index()
	{
		$solicitudes = Solicitudes::select(array('nombre_curso','ambito',DB::raw('sum(cupos) as total')))->group_by('nombre_curso')->get();
		$ambitos = Solicitudes::group_by('ambito')->get();
		//$suma = Solicitudes::group_by('nombre_curso')->get(array(DB::raw('sum(cupos) as total')));
		return View::make('admin.inicio')
					->with('usuario',$this->usuario)
					->with('activo','inicio')
					->with('titulo','Inicio')
					->with('solicitudes',$solicitudes)
					->with('ambitos',$ambitos);
					//->with('suma',$suma);
	}
}