<?php


// Modelo de la tabla conferencistas.
class Participante extends Eloquent{

	// Relacion existente con los clientes de 1 a *
	public function cliente()
	{
		return $this->has_one('Cliente');
	}

	//Relacion existente con los cursos de 1 a *
	public function curso()
	{
		return $this->has_one('Curso');
	}

}