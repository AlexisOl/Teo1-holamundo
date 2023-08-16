<?php
include("../db/conexion.php");
?>
<?php

$nombreUser = "";
$password = "";

    //GENERA LA CONSULTA Y CONEXION 
 if($_POST) {
    $nombreUser = $_POST['valorUsuario'];
    $conexionUsuarios = new conexion();
    $sentencia = $conexionUsuarios->consult("SELECT * FROM `USUARIOS` WHERE `nombre` LIKE '$nombreUser'");
    if ($sentencia) {
        $row = $sentencia[0]; // Obtén el primer resultado
        $password = $row['contrasenia'];
    } else {
        // Si no se encuentra el usuario, establece la contraseña en blanco
        $password = "";
    }
    
 }


 //eliminar
 if ($_GET) {
    $identificador = $_GET['borrar'];
    $conexion = new conexion();
    $sentenciaSql = "DELETE FROM `USUARIOS` WHERE `USUARIOS`.`nombre` = '$identificador'";
    $conexion->ejecucion($sentenciaSql);
}

//edicion

if ($_POST && isset($_POST['editarUsuario'])) {
    // Obtén los valores editados
    $nombreEditado = $_POST['valorUsuario'];
    $contraseniaEditada = $_POST['valorPassword'];

    // Realiza la actualización en la base de datos
    $conexionUsuarios = new conexion();
    $sentenciaUpdate = "UPDATE `USUARIOS` SET `contrasenia` = '$contraseniaEditada' WHERE `nombre` = '$nombreEditado'";
    $conexionUsuarios->ejecucion($sentenciaUpdate);

    echo "Usuario Actualizado";
}

?>

<div class="container_usuarios">
    <!--INFO -->
    <div class="infoText">
        <h1>Ingreso de Usuarios</h1>
        <h2>Ingrese los Datos</h2>
        <hr>
    </div>
    <!--INGRESO DE LOGIN -->
    <form class="formlogin" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombreUsuario" class="form-label">Nombre de Usuario</label>
            <input name="valorUsuario" type="text" class="form-control" id="nombreUsuario" aria-describedby="nombreHelp" value="<?php echo $nombreUser?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputAreaInv" class="form-label">Contrasenia</label>
            <input name="valorPassword" type="text" class="form-control" id="exampleInputPassword" value="<?php echo $password?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputTrabajo" class="form-label">Repita contrasenia</label>
            <input name="valorPassword2" type="text" class="form-control" id="exampleInputPasswordAgain" value="<?php echo $password?>">
        </div>


        <!--INGRESO DE botones -->


        <div class="container_buttons">
            <button type="submit" class="btn boton btn-info">Buscar</button>
            <button type="submit" class="btn boton  btn-warning" name="editarUsuario">Editar</button>
            <a class="btn boton btn-danger" href="?borrar=<?php echo $nombreUser; ?>">Eliminar</a>

        </div>
    </form>
</div>