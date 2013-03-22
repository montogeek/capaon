<?php

	class Potencial_Task{

		public function run($arguments)
		{
			$particiantes = Participante::all();
			foreach ($particiantes as $participante) {
				$creado = new DateTime(date($participante->created_at));
				$ahora = new DateTime('now');
				$intervalo = $ahora->diff($creado);
				if ($intervalo->format('%d') >= '1') {
						Cliente::update($participante->cliente_id, array('potencial' => 'si'));
						$participante->delete();
				}
			}
		}
	}