<?php
require_once("db/conexion.php");
class manejo{
    private $control;
    public function __construct(){
        $this->control= new conexion();
    }
    //EDICION ------- Colaboradores 

    static function mostrarCOlaboradores(){
        $colaboradores = new conexion();
        define("resultado",$colaboradores->muestraColaboradores("COLABORADORES"));
    }



    static function eliminarColaborador($colaboradoresId) {
        $colaboradores = new conexion();
        $colaboradores->eliminarColaborador("COLABORADORES",$colaboradoresId);
        header("Location: /practica1-TS1/Admin/direccionColaboradoresCrud.php");
        exit();
    }
}