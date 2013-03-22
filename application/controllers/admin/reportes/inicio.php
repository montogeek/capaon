<?php

/**
 * Encargado de la pantalla de inicio de sesión.
 * FALTA FILTRARLO PARA QUE SOLO SEA ACCESIBLE SI EL USUARIO ESTÁ AUTENTIFICADO.
 */
class Admin_Reportes_Inicio_Controller extends Base_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->filter('before','administrador');
	}

	/**
	 * Carga la vista de inicio del Administrador con el objeto Usuario autentificado.
	 */
	public function action_index()
	{
		$usuario = Auth::user()->cliente()->first();
		$cursos = Curso::select(array('id', 'nombre'))->get();
		return View::make('admin.reportes.inicio')->with('usuario',$usuario)->with('cursos',$cursos)->with('activo','reportes')->with('titulo','Reportes');
	}

	public function action_reportecursos(){

		$cursos = Curso::select(array('id', 'nombre','resumen'))->where('estado', '=', '1')->get();
    	$content = View::make('pdf/cursos')->with('cursos',$cursos)->render();
		$pdf = new Tcpdf();
		$pdf->AddPage();
		$pdf->SetFont('dejavusans',16);
		$pdf->WriteHTML($content, true, false, true, false, '');
		return Response::make($pdf->Output(), 200, array('Content-type' => 'application/pdf'));
	}

	public function action_cursodetallado($id){

		$usuario = Auth::user()->cliente()->first();
		$curso = Curso::find($id); // Encuentro el curso con el ID enviado.
		$conferencista = Curso::find($id)->conferencista()->get();
		$content = View::make('pdf/mascursos')->with('curso',$curso)->with('conferencista',$conferencista)->render();
		$pdf = new Tcpdf();
		$pdf->AddPage();
		$pdf->SetFont('helvetica',16);
		$pdf->WriteHTML($content, true, false, true, false, '');
		return Response::make($pdf->Output(), 200, array('Content-type' => 'application/pdf'));
	}

	public function action_reportematriculados(){

		$usuario = Auth::user()->cliente()->first();
		$cursos = Curso::select(array('id', 'nombre'))->where('estado', '=', '1')->get();
		$data = array();
		foreach ($cursos as $curso) {
			$pack = array($curso, array('matricula'.$curso->id => $curso->cliente()->get()));
			$data[] = $pack;
		}
		$content = View::make('pdf/matriculados')->with('data',$data)->render();
		$pdf = new Tcpdf();
		$pdf->AddPage();
		$pdf->SetFont('dejavusans',16);
		$pdf->WriteHTML($content, true, false, true, false, '');
		return Response::make($pdf->Output(), 200, array('Content-type' => 'application/pdf'));
	}

}