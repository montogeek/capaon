<?php

class User extends Eloquent{

	//Se establece la tabla con la que estará relacionada el modelo.
    public static $table = 'usuarios';

    public function cliente()
    {
        return $this->has_one('Cliente','id');
    }
}