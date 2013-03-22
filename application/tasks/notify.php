<?php 

class Notify_Task {

    public function run($arguments)
    {
        $info = new InfoEmpresa;
        $info->mision = "Hola";
        $info->vision = "Aloha";
        $info->quien = "Yo";
        $info->email = "El correo";
        $info->save();
    }

}