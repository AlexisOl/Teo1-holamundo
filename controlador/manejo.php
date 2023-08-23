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

    //mostrar noticias
    static function mostrarNoticias(){
        $colaboradores = new conexion();
        define("resultadoNoticias",$colaboradores->muestraNoticias("NOTICIAS"));
    }
    //mostrar asignaciones 
    static function mostrarAsignacionesNoticias(){
        $colaboradores = new conexion();
        define("resultadoAsigacionesNoticias",$colaboradores->muestraAsingacionNoticias("ASIGNACION_NOTICIAS"));
    } 

    static function buscarNoticiaAsignacion_NoticiaId($identificador){
        $colaboradores = new conexion();
        $busqueda = $colaboradores->buscarIdNoticia("ASIGNACION_NOTICIAS",$identificador);
        return $busqueda;
    }
    static function buscarNoticia_NoticiaId($identificador){
        $colaboradores = new conexion();
        $busqueda = $colaboradores->buscarIdNoticia_noticia("NOTICIAS",$identificador);
        return $busqueda;
    }
    static function buscarColaborador_NoticiaId($identificador){
        $colaboradores = new conexion();
        $busqueda = $colaboradores->buscarIdNoticia_Colaborador("COLABORADORES",$identificador);
        return $busqueda;
    }

    static function mostrarOrdenDescendenteNoticiasFinales(){
        $colaboradores = new conexion();
        $resultadoAsigacionesNoticiasDesc = $colaboradores->mostrarOrdenDescendenteAsignacion("ASIGNACION_NOTICIAS");

        return $resultadoAsigacionesNoticiasDesc;
    }

    //comentarios
    static function ingresoComentarios($correo, $mensaje, $comentario_noticia){
        $ingresoNoticias = new conexion();
        $ingresosql = $ingresoNoticias->guardarComentarios("COMENTARIOS",$correo, $mensaje, $comentario_noticia);
        
    }
// actividadees
static function mostrarActividades(){
    $colaboradores = new conexion();
    define("resultadoActividades",$colaboradores->muestraNoticias("ACTIVIDADES"));
}
// ASIGANCIONES ACTIVIDADES
        static function mostrarAsignacionesActividades(){
            $colaboradores = new conexion();
            define("resultadoAsigacionesActividades",$colaboradores->muestraAsingacionActividades("ASIGNACION_ACTIVIDADES"));
        } 

        static function buscarActividadesAsignacionActividadesId($identificador){
            $colaboradores = new conexion();
            $busqueda = $colaboradores->buscarIdActividad("ASIGNACION_ACTIVIDADES",$identificador);
            return $busqueda;
        }
        static function buscarActividades_ActividadesId($identificador){
            $colaboradores = new conexion();
            $busqueda = $colaboradores->buscarIdActividad_Actividad("ACTIVIDADES",$identificador);
            return $busqueda;
        }
        static function buscarUsuarioActividadesId($identificador){
            $colaboradores = new conexion();
            $busqueda = $colaboradores->buscarIdActividad_Usuario("USUARIOS",$identificador);
            return $busqueda;
        }

        static function mostrarOrdenDescendenteActividadesFinales(){
            $colaboradores = new conexion();
            $resultadoAsigacionesNoticiasDesc = $colaboradores->mostrarOrdenDescendenteAsignacionActividades("ASIGNACION_ACTIVIDADES");

            return $resultadoAsigacionesNoticiasDesc;
        }
    

        // para usuarios

        static function mostrarUsuario(){
            $colaboradores = new conexion();
            define("resultadoUsuarios",$colaboradores->mostrarUsuarios("USUARIOS"));
      
        }


}