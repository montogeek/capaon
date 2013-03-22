<?php

/**
 * Encargado de guardar la información institucional de la empresa.
 */
class Admin_Infoempresa_Controller extends Base_Controller
{
	/**
	 * Todas las acciones solo podrán ser ejecutadas por un usuario autenticado.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'administrador');
	}

	/**
	 * Carga la vista para editar la información de la empresa.
	 */
    public function action_index()
    {   
        $usuario = Auth::user()->cliente()->first();
    	$informacion = InfoEmpresa::all();
        return View::make('admin.infoempresa')->with('informacion',$informacion)->with('usuario', $usuario)->with('activo','institucional')->with('titulo','Información Institucional');
    }


    public function action_guardartodo()
    {
        //dd(Input::get());
        $informacion = InfoEmpresa::find(1);
        $informacion->update('1', Input::except('_wysihtml5_mode'));
        //$informacion->save();
        return Redirect::to('admin/infoempresa')->with('mensaje','¡Todo guardado correctamente!');
    }

}