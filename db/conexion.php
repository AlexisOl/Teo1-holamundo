<?php


class conexion {
   private $host = 'localhost';
   private $dbname = 'escuelaMatematicas';
   private $username = 'root';
   private $password = 'password';

   private $conexion;


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
}




