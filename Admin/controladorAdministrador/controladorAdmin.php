<?php
require_once("model/modeloAdmin.php");
//require_once("../../db/conexion.php");
class manejoAdmin{
    private $control;
    public function __construct(){
        $this->control= new modeloAdmin();
    }
    //EDICION ------- Colaboradores 

    static function mostrarCOlaboradores(){
        $colaboradores = new modeloAdmin();
        define("resultado",$colaboradores->muestraColaboradores("COLABORADORES"));
    }


    static function eliminarColaborador($colaboradoresId) {
        $colaboradores = new modeloAdmin();
        $colaboradores->eliminarColaborador("COLABORADORES",$colaboradoresId);
      
    }


    static function buscarColaboradorId($identificador){
        $colaboradores = new modeloAdmin();
        $busqueda = $colaboradores->buscarColaboradores("COLABORADORES",$identificador);
        return $busqueda;
    }
    //noticias

}