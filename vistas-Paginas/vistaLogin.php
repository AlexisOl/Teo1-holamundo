<?php
session_start();

include("./sections/header.php");

if ($_POST) {
  $nombre = $_POST["valorUsuario"];



 // echo "salida " . $nombre;
 if (($_POST["valorUsuario"]=="alexxus") && ($_POST["valorContraseña"]==1234)) {
  $_SESSION['valorUsuario']="alexxus";

  echo "salida " . $nombre;
  header("location:generalAdmin.php");
    
  } else {
    echo "Usuario o constrasenia incorrectos, intente nuevamente"."</br>";
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



<button type="submit" class="boton2" onclick="location.href='./db/conexion.php'">prueba conexion</button>

<?php include("./sections/footer.php") ?>
