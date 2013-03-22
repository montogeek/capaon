<?php

// Modelo del manejo de la Información Institucional de la Empresa.
class InfoEmpresa extends Eloquent{

	// Se establece la tabla con la que estará relacionada el modelo.
    public static $table = 'info_capaon';

    // Se establece que no se usarán los timestamps en la tabla.
    public static $timestamps = false;

}