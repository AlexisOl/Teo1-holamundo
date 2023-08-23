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
   public function editarColaborador($tabla, $identificador, $nuevoNombre, $nuevaAreaInv, $nuevoTrabajo, $imagen) {
    // Consulta SQL para actualizar un registro
    $sql = "UPDATE " . $tabla . " SET nombre = :nombre, areaInvestigacion = :areaInv, areaTrabajo = :trabajo, imagen = :imagen WHERE identificadorColaborador = :identificador";

    // Preparar la consulta
    $stmt = $this->conexion->prepare($sql);

    // Vincular valores a los marcadores de posición
    $stmt->bindParam(':nombre', $nuevoNombre, PDO::PARAM_STR);
    $stmt->bindParam(':areaInv', $nuevaAreaInv, PDO::PARAM_STR);
    $stmt->bindParam(':trabajo', $nuevoTrabajo, PDO::PARAM_STR);
    $stmt->bindParam(':imagen', $imagen, PDO::PARAM_STR);
    $stmt->bindParam(':identificador', $identificador, PDO::PARAM_INT);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // La actualización se realizó correctamente
        header('Location:direccionEdicionColaborador.php');
        return true;
    } else {
        // Hubo un error en la actualización
        return false;
    }
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

    public function editarNoticia($tabla, $id, $titulo, $resumen, $general, $imagen) {
        // Consulta SQL para actualizar un registro
        $sql = "UPDATE " . $tabla . " SET titulo = :titulo, resumen = :resumen, general = :general, imagen = :imagen WHERE id = :id";
    
        // Preparar la consulta
        $stmt = $this->conexion->prepare($sql);
    
        // Vincular valores a los marcadores de posición
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':resumen', $resumen, PDO::PARAM_STR);
        $stmt->bindParam(':general', $general, PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $imagen, PDO::PARAM_STR);
    
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // La actualización se realizó correctamente
            header('Location:direccionEdicionNoticia.php');
            return true;
        } else {
            // Hubo un error en la actualización
            return false;
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


    public function editarActividades($tabla, $identificador, $nombre, $fecha_inicio, $fecha_fin, $descripcion, $imagen) {
        // Consulta SQL para actualizar un registro
        $sql = "UPDATE $tabla SET nombre = :nombre, fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin, imagen = :imagen, descripcion = :descripcion WHERE identificador = :identificador";
        
        // Preparar la consulta
        $stmt = $this->conexion->prepare($sql);
    
        // Vincular valores a los marcadores de posición
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':fecha_inicio', $fecha_inicio, PDO::PARAM_STR);
        $stmt->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':identificador', $identificador, PDO::PARAM_INT);
    
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // La actualización se realizó correctamente
            header('Location: direccionEdicionActividades.php');
            return true;
        } else {
            // Hubo un error en la actualización
            return false;
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


           //usuarios para el login:
           public function mostrarUsuarios($tabla){
            $sql = "SELECT * FROM " . $tabla . ";";
            $generarAccion = $this->conexion->query($sql);
            return $generarAccion->fetchAll();
        }

        public function buscarUsuarios($tabla, $nombre) {
            $sql = "SELECT * FROM " . $tabla .  " WHERE `nombre` = ".$nombre.";";
            $generarAccion = $this->conexion->query($sql);
            return $generarAccion->fetchAll(); 
           }
   
}

?>
