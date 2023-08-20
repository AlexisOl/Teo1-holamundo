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
        echo "conexion realizada"."<br/>";
    
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
   public function guardarInformacion($tabla) {
    
   }
}



?>
