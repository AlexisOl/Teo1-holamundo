<?php
session_start();

include("./sections/header.php");

if ($_POST) {
  require_once("controlador/manejo.php");
  manejo::mostrarUsuario();
 // echo "salida " . $nombre;
 foreach(resultadoUsuarios as $valores) {
  if (($_POST["valorUsuario"]==$valores['nombre']) && ($_POST["valorContraseña"]==$valores['contrasenia'])) {
    $_SESSION['valorUsuario']=$valores['nombre'];
    header("location:generalAdmin.php");
    break;
    } 
 }

}


?>
<div class="container_Login">
<!--INFO -->
<div class="infoText">
  <h2>Ingrese sus Datos</h2>
  <hr>
</div>
<!--INGRESO DE LOGIN -->
<form  class="formlogin" method="post">
  <div class="mb-3">
    <label for="nombreUsuario" class="form-label">Nombre de Usuario</label>
    <input name="valorUsuario" type="text" class="form-control" id="nombreUsuario" aria-describedby="nombreHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input name="valorContraseña" type="password" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <button type="submit" class="boton1">Ingreso</button>
</form>
</div> 



<?php include("./sections/footer.php") ?>
