<?php


// Modelo de la tabla conferencistas.
class Conferencista extends Eloquent{

	// Se establece que no se usarán los timestans.
	public static $timestamps = false;
	
	// Relación de muchos a muchos con el modelo Cursos.
	public function curso()
	{
		return $this->has_many_and_belongs_to('Curso');
	}

}