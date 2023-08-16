<!--CRUD PARA LOS COLABORADORES-->
<?php
include("../db/conexion.php");
?>

<?php

if ($_POST) {

    if (isset($_POST["insertar"])){


        $nuevaconexion = new conexion();

        // AHORA CADA VALOR 
    
        $nombre = $_POST['valorUsuario'];
        $password1 = $_POST['valorPassword'];
        $password2 = $_POST['valorPassword2'];
    
        if ($password1 == $password2) {
            $sql = "INSERT INTO `USUARIOS` (`id`, `nombre`, `contrasenia`) VALUES (NULL, '$nombre', '$password1');";
            $nuevaconexion->ejecucion($sql);
          
        } else {
            echo "Las contraseñas no coinciden";
        }
    }     elseif (isset($_POST["redirigir"])) {
     
            // Redirige después de insertar los datos
            header("Location: /practica1-TS1/Admin/direccionEdicionUser.php");
            exit(); // Asegurarse de que no haya más ejecución de código después de la redirección
    }


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
            <input name="valorUsuario" type="text" class="form-control" id="nombreUsuario" aria-describedby="nombreHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputAreaInv" class="form-label">Contrasenia</label>
            <input name="valorPassword" type="text" class="form-control" id="exampleInputPassword">
        </div>

        <div class="mb-3">
            <label for="exampleInputTrabajo" class="form-label">Repita contrasenia</label>
            <input name="valorPassword2" type="text" class="form-control" id="exampleInputPasswordAgain">
        </div>


        <!--INGRESO DE botones -->


        <div class="container_buttons">
            <button type="submit" class="btn boton btn-primary" name="insertar">Ingreso</button>
            <button type ="submit" class="btn boton btn-info" name="redirigir">Otras manipulaciones</button>
        </div>
       
    </form>
</div>