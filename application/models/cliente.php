<?php 

// Modelo de la tabla clientes.
class Cliente extends Eloquent{


	public function curso()
	{
		return $this->has_many_and_belongs_to('Curso', 'participantes');
	}

	public function user()
	{
		return $this->belongs_to('User');
	}

	// Relación de participantes
	public function participante()
	{
		return $this->has_many('Participante');
	}
}