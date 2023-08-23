<?php


class conexion {
   private $host = 'localhost';
   private $dbname = 'escuelaMatematicas';
   private $username = 'root';
   private $password = 'password';

   private $conexion;

   private $existencia;
   public function __construct(){
    try {
        // Crear una nueva conexión PDO
        $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
    
        // Configurar el modo de error para mostrar excepciones
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Resto de operaciones con la base de datos...
    } catch (PDOException $e) {
        // Manejo de errores
        echo "Error de conexión: " . $e->getMessage();
    }
   }


   public function ejecucion($sql) {
    $this->conexion->exec($sql);
    // crea ejecucion
    return $this->conexion->lastInsertId();
   }

   // para select

   public function consult($sql) {
    $valor = $this->conexion->prepare($sql);
    $valor->execute();
    return $valor->fetchAll();
   }

   public function muestraColaboradores($tabla)
   {
       $sql = "SELECT * FROM " . $tabla . ";";
       $generarAccion = $this->conexion->query($sql);
       return $generarAccion->fetchAll();
   
   }

   public function verColaboradores($tabla)  {
    $sql = "SELECT * FROM " . $tabla . ";";
    $generarAccion = $this->conexion->query($sql);
    while ($fila = $generarAccion->fetchAll()) {
        $this->existencia[] = $fila;
    }
    return $this->existencia;
}



   public function eliminarColaborador($tabla, $id) {
    try {
        $sentenciaSql = "DELETE FROM " . $tabla . " WHERE `identificadorColaborador` = " . $id . ";";
        $generarAccion = $this->conexion->query($sentenciaSql);
        if ($generarAccion) {
            header('Location:direccionEdicionColaborador.php');
            return true;
        } else {
            return false;
        }
    }catch(exception $e){
        echo "error en ".$e;

    }

   }
    //noticias
    public function muestraNoticias($tabla){
        $sql = "SELECT * FROM " . $tabla . ";";
        $generarAccion = $this->conexion->query($sql);
        return $generarAccion->fetchAll();
    
    }
   //asignaciones

        public function muestraAsingacionNoticias($tabla){
            $sql = "SELECT * FROM " . $tabla . ";";
            $generarAccion = $this->conexion->query($sql);
            return $generarAccion->fetchAll();

        }  

        public function mostrarOrdenDescendenteAsignacion($table){
            $sql = "SELECT * FROM " . $table ." ORDER BY `id` DESC;";
            $generarAccion = $this->conexion->query($sql);
            return $generarAccion->fetchAll();
        } 

        public function buscarIdNoticia($tabla, $identificador) {
            $sql = "SELECT * FROM " . $tabla .  " WHERE `identificadorNoticia` = ".$identificador.";";
            $generarAccion = $this->conexion->query($sql);
            return $generarAccion->fetchAll(); 
        }
        public function buscarIdNoticia_noticia($tabla, $identificador) {
            $sql = "SELECT * FROM " . $tabla .  " WHERE `id` = ".$identificador.";";
            $generarAccion = $this->conexion->query($sql);
            return $generarAccion->fetchAll(); 
        }
        public function buscarIdNoticia_Colaborador($tabla, $identificador) {
            $sql = "SELECT * FROM " . $tabla .  " WHERE `identificadorColaborador` = ".$identificador.";";
            $generarAccion = $this->conexion->query($sql);
            return $generarAccion->fetchAll(); 
        }

        //COMENTARIOS
        public function guardarComentarios($tabla,  $correo, $mensaje, $comentario_noticia) {
            $sql = "INSERT INTO ".$tabla." (id, correo, mensaje, comentario_noticia) VALUES (NULL, :correo, :mensaje, :comentario_noticia)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
            $stmt->bindParam(':comentario_noticia', $comentario_noticia, PDO::PARAM_STR);
        
            $stmt->execute();
            return $this->conexion->lastInsertId();   
        }

        //actividades
        public function muestraActividades($tabla){
            $sql = "SELECT * FROM " . $tabla . ";";
            $generarAccion = $this->conexion->query($sql);
            return $generarAccion->fetchAll();
        
        }

        //asignacion Actividades
        public function muestraAsingacionActividades($tabla){
            $sql = "SELECT * FROM " . $tabla . ";";
            $generarAccion = $this->conexion->query($sql);
            return $generarAccion->fetchAll();

        }  

        public function mostrarOrdenDescendenteAsignacionActividades($table){
            $sql = "SELECT * FROM " . $table ." ORDER BY `id` DESC;";
            $generarAccion = $this->conexion->query($sql);
            return $generarAccion->fetchAll();
        } 

        public function buscarIdActividad($tabla, $identificador) {
            $sql = "SELECT * FROM " . $tabla .  " WHERE `identificadorActividad` = ".$identificador.";";
            $generarAccion = $this->conexion->query($sql);
            return $generarAccion->fetchAll(); 
        }
        public function buscarIdActividad_Actividad($tabla, $identificador) {
            $sql = "SELECT * FROM " . $tabla .  " WHERE `identificador` = ".$identificador.";";
            $generarAccion = $this->conexion->query($sql);
            return $generarAccion->fetchAll(); 
        }
        public function buscarIdActividad_Usuario($tabla, $identificador) {
            $sql = "SELECT * FROM " . $tabla .  " WHERE `id` = ".$identificador.";";
            $generarAccion = $this->conexion->query($sql);
            return $generarAccion->fetchAll(); 
        }

        //usuarios para el login:
        public function mostrarUsuarios($tabla){
            $sql = "SELECT * FROM " . $tabla . ";";
            $generarAccion = $this->conexion->query($sql);
            return $generarAccion->fetchAll();
        }
   
}



?>
