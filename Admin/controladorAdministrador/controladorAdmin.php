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

    static function editarColaborador($identificador,  $nuevoNombre, $nuevaAreaInv, $nuevoTrabajo, $imagen) {
        $colaboradores = new modeloAdmin();
        $colaboradores->editarColaborador("COLABORADORES",$identificador, $nuevoNombre, $nuevaAreaInv, $nuevoTrabajo, $imagen);
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

    static function editarNoticia($id, $titulo, $resumen, $general, $imagen){
        $colaboradores = new modeloAdmin();
        $colaboradores->editarNoticia("NOTICIAS",$id, $titulo, $resumen, $general, $imagen);
    }

    //asignacion noticias
    static function ingresoAsignacionNoticias($identificadorColab, $area, $identificadorNoti, $fecha){
        $ingresoNoticias = new modeloAdmin();
        $ingresosql = $ingresoNoticias->guardarAsigncacionInformacionNoticia("ASIGNACION_NOTICIAS",$identificadorColab, $area, $identificadorNoti, $fecha);
        
    }
    static function mostrarAsignacionesNoticias(){
        $colaboradores = new modeloAdmin();
        define("resultadoAsigacionesNoticias",$colaboradores->muestraAsingacionNoticias("ASIGNACION_NOTICIAS"));
    } 

    //comentarios
    static function mostrarComentarios(){
        $colaboradores = new modeloAdmin();
        define("resultadoComentarios",$colaboradores->muestraAsingacionNoticias("COMENTARIOS"));
    } 

    //actividades
    static function ingresoActividades($titulo, $fecha_inicio, $fecha_fin , $descripcion, $imagen){
        $ingresoNoticias = new modeloAdmin();
        $ingresosql = $ingresoNoticias->guardarInformacionActividad("ACTIVIDADES", $titulo, $fecha_inicio, $fecha_fin, $descripcion, $imagen);
        
    }
    static function mostrarActividades(){
        $colaboradores = new modeloAdmin();
        define("resultadoActividades",$colaboradores->muestraActividades("ACTIVIDADES"));
    }   
    static function eliminarActividades($idActividad) {
        $colaboradores = new modeloAdmin();
        $colaboradores->eliminarActividades("ACTIVIDADES",$idActividad);
      
    }
    static function editarActividadesControl($identificador,  $nombre, $fecha_inicio, $fecha_fin , $descripcion, $imagen){
        $colaboradores = new modeloAdmin();
        $colaboradores->editarActividades("ACTIVIDADES",$identificador,  $nombre, $fecha_inicio, $fecha_fin , $descripcion, $imagen);
    }
    
  //asignacion Actividades
  static function ingresoAsignacionActividad($identificadorUser, $area, $identificadorAct, $fecha){
    $ingresoNoticias = new modeloAdmin();
    $ingresosql = $ingresoNoticias->guardarAsigncacionInformacionActividad("ASIGNACION_ACTIVIDADES",$identificadorUser, $area, $identificadorAct, $fecha);
    
}
static function mostrarAsignacionesActividades(){
    $colaboradores = new modeloAdmin();
    define("resultadoAsigacionesActividades",$colaboradores->muestraAsingacionActividad("ASIGNACION_ACTIVIDADES"));
} 
       // para usuarios

       static function mostrarUsuario(){
        $colaboradores = new modeloAdmin();
        define("resultadoUsuarios",$colaboradores->mostrarUsuarios("USUARIOS"));
  
    }
    static function buscarUsuarioNombre($nombre){
        $colaboradores = new modeloAdmin();
        $busqueda = $colaboradores->buscarUsuarios("USUARIOS",$nombre);
        return $busqueda;
    }

    

}