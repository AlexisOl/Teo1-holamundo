<?php
require_once("db/conexion.php");
class manejo{
    private $control;
    public function __construct()
    {
        $this->control= new conexion();
    }
    static function mostrarCOlaboradores()
    {
        $colaboradores = new conexion();
        define("resultado",$colaboradores->muestraColaboradores("COLABORADORES"));
    }
}