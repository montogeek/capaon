<?php

// Modelo de la tabla Cursos.
class Curso extends Eloquent{

	// Relación de muchos a muchos con el modelo Conferencista.
	public function conferencista()
	{
		return $this->has_many_and_belongs_to('Conferencista');
	}

	public function cliente()
	{
		return $this->has_many_and_belongs_to('Cliente', 'participantes');
	}

	// Relación de * a 1 a los participantes.
	public function participante()
	{
		return $this->has_many('Participante');
	}
}