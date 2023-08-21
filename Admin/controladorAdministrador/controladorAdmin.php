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
    static function ingresoNoticias($titulo, $resumen, $general, $imagen ){
        $ingresoNoticias = new modeloAdmin();
        $ingresosql = $ingresoNoticias->guardarInformacionNoticia("NOTICIAS", $titulo, $resumen, $general, $imagen);
        
    }
    static function mostrarNoticias(){
        $colaboradores = new modeloAdmin();
        define("resultadoNoticias",$colaboradores->muestraNoticias("NOTICIAS"));
    }   
    static function eliminarNoticias($idNoticia) {
        $colaboradores = new modeloAdmin();
        $colaboradores->eliminarNoticias("NOTICIAS",$idNoticia);
      
    }

    //asignacion noticias
    static function ingresoAsignacionNoticias($identificadorColab, $area, $identificadorNoti, $fecha){
        $ingresoNoticias = new modeloAdmin();
        $ingresosql = $ingresoNoticias->guardarAsigncacionInformacionNoticia("ASIGNACION_NOTICIAS",$identificadorColab, $area, $identificadorNoti, $fecha);
        
    }

}