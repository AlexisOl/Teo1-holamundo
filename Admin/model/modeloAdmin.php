<?php


class modeloAdmin {
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
   public function buscarColaboradores($tabla, $identificador) {
    $sql = "SELECT * FROM " . $tabla .  " WHERE `identificadorColaborador` = ".$identificador.";";
    $generarAccion = $this->conexion->query($sql);
    return $generarAccion->fetchAll(); 
   }


   //noticias
   public function guardarInformacionNoticia($tabla,  $titulo, $resumen, $general, $imagen) {
        $sql = "INSERT INTO NOTICIAS (titulo, resumen, general, imagen) VALUES (:titulo, :resumen, :general, :imagen)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':resumen', $resumen, PDO::PARAM_STR);
        $stmt->bindParam(':general', $general, PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $imagen, PDO::PARAM_STR);
    
        $stmt->execute();
        return $this->conexion->lastInsertId();   
    }

    public function muestraNoticias($tabla){
        $sql = "SELECT * FROM " . $tabla . ";";
        $generarAccion = $this->conexion->query($sql);
        return $generarAccion->fetchAll();
    
    }
        public function eliminarNoticias($tabla, $id) {
            try {
                $sentenciaSql = "DELETE FROM " . $tabla . " WHERE `id` = " . $id . ";";
                $generarAccion = $this->conexion->query($sentenciaSql);
                if ($generarAccion) {
                    header('Location:direccionEdicionNoticia.php');
                    return true;
                } else {
                    return false;
                }
            }catch(exception $e){
                echo "error en ".$e;
        
            }
    }
    //asignacion noticias

    public function guardarAsigncacionInformacionNoticia($tabla,  $identificadorColab, $area, $identificadorNoti, $fecha) {
        $sql = "INSERT INTO ".$tabla." (id, identificadorNoticia, identificadorColabo, fecha, area) VALUES (NULL, :identificadorNoti, :identificadorColab, :fecha, :area)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':identificadorNoti', $identificadorNoti, PDO::PARAM_STR);
        $stmt->bindParam(':identificadorColab', $identificadorColab, PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':area', $area, PDO::PARAM_STR);
    
        $stmt->execute();
        return $this->conexion->lastInsertId();   
    }

    public function muestraAsingacionNoticias($tabla){
        $sql = "SELECT * FROM " . $tabla . ";";
        $generarAccion = $this->conexion->query($sql);
        return $generarAccion->fetchAll();
    
    }
    //comentarios 

    public function muestraComentarios($tabla){
        $sql = "SELECT * FROM " . $tabla . ";";
        $generarAccion = $this->conexion->query($sql);
        return $generarAccion->fetchAll();
    
    }

    //ACTIVIDADES

    public function guardarInformacionActividad($tabla,  $titulo, $fecha_inicio, $fecha_fin , $descripcion, $imagen) {
        $sql = "INSERT INTO ACTIVIDADES (nombre, fecha_inicio, fecha_fin, imagen, descripcion ) VALUES (:titulo, :fecha_inicio, :fecha_fin, :imagen ,:descripcion)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':fecha_inicio', $fecha_inicio, PDO::PARAM_STR);
        $stmt->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $imagen, PDO::PARAM_STR);
    
        $stmt->execute();
        return $this->conexion->lastInsertId();   
    }

    public function muestraActividades($tabla){
        $sql = "SELECT * FROM " . $tabla . ";";
        $generarAccion = $this->conexion->query($sql);
        return $generarAccion->fetchAll();
    
    }
        public function eliminarActividades($tabla, $id) {
            try {
                $sentenciaSql = "DELETE FROM " . $tabla . " WHERE `identificador` = " . $id . ";";
                $generarAccion = $this->conexion->query($sentenciaSql);
                if ($generarAccion) {
                    header('Location:direccionEdicionActividades.php');
                    return true;
                } else {
                    return false;
                }
            }catch(exception $e){
                echo "error en ".$e;
        
            }
    }

    // asignacion Actividades
    public function guardarAsigncacionInformacionActividad($tabla, $identificadorUser, $area, $identificadorAct, $fecha) {
        $sql = "INSERT INTO ".$tabla." (id, identificadorActividad, identificadorUsuario, fecha, area) VALUES (NULL, :identificadorAct, :identificadorUser, :fecha, :area)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':identificadorUser', $identificadorUser, PDO::PARAM_STR);
        $stmt->bindParam(':identificadorAct', $identificadorAct, PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':area', $area, PDO::PARAM_STR);
    
        $stmt->execute();
        return $this->conexion->lastInsertId();   
    }

    public function muestraAsingacionActividad($tabla){
        $sql = "SELECT * FROM " . $tabla . ";";
        $generarAccion = $this->conexion->query($sql);
        return $generarAccion->fetchAll();
    
    }
}

?>
