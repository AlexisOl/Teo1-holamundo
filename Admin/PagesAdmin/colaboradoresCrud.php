
<?php
 include("./sectionsAdmin/headerAdmin.php");
  ?>




<!--CRUD PARA LOS COLABORADORES-->
<?php
include("../db/conexion.php");
?>

<?php

if ($_POST) {

  if (isset($_POST["insertar"])){
    if (!empty($_POST['valorUsuario']) && !empty($_POST['valorAreaInv']) && !empty($_POST['valorTrabajo'])) {
      $nuevaconexion = new conexion();

      // AHORA CADA VALOR 
    
      $nombre = $_POST['valorUsuario'];
    
      $tiempo = new DateTime();
      if($_FILES['valorImagen']['name'] != null) {
        $imagen =$tiempo->getTimestamp()."_".$_FILES['valorImagen']['name'];
        $ingresoImagen =$_FILES['valorImagen']['tmp_name'];
        //ingreso de foros
        move_uploaded_file($ingresoImagen,"../img/imagenesColaboradores/".$imagen);
      } else{
        $imagen =null;
  
      }
  
      
      $areaInv = $_POST['valorAreaInv'];
      $areaTrabajo = $_POST['valorTrabajo'];
    
      $sql ="INSERT INTO `COLABORADORES` (`identificadorColaborador`, `nombre`, `areaInvestigacion`, `areaTrabajo`, `imagen`) VALUES (NULL, '$nombre', '$areaInv', '$areaTrabajo', '$imagen');";
      $nuevaconexion->ejecucion($sql);
    
    } else {
      if (empty($_POST["valorUsuario"])) {
        $nameErr = "Name is required";
      }
    }
   
  }   elseif (isset($_POST["redirigir"])) {
     
    // Redirige después de insertar los datos
    header("Location: /practica1-TS1/Admin/direccionEdicionColaborador.php");
    exit(); // Asegurarse de que no haya más ejecución de código después de la redirección
}
 
}

?>


<div class="container_colaboradores">
<!--INFO -->
<div class="infoText">
  <h2>Ingrese sus Datos</h2>
  <hr>
</div>
<!--INGRESO DE LOGIN -->
<form  class="formlogin" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="nombreUsuario" class="form-label">Nombre de Colaborador</label>
    <input name="valorUsuario" type="text" class="form-control" id="nombreUsuario" aria-describedby="nombreHelp" onblur="validateField('nombreUsuario', 'errorUsuario')" >
     <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

  </div>

  <div class="mb-3">
    <label for="exampleInputAreaInv" class="form-label">Area de Investigacion</label>
    <input name="valorAreaInv" type="text" class="form-control" id="exampleInputAreaInv" onblur="validateField('nombreUsuario', 'errorUsuario')" >
    <div class="error-message" id="errorUsuario">Campo obligatorio</div>

  </div>

  <div class="mb-3">
    <label for="exampleInputTrabajo" class="form-label">Area de Trabajo</label>
    <input name="valorTrabajo" type="text" class="form-control" id="exampleInputTrabajo" onblur="validateField('nombreUsuario', 'errorUsuario')">
    <div class="error-message" id="errorUsuario">Campo obligatorio</div>

  </div>

  <div class="mb-3">
    <label for="exampleInputImg" class="form-label">Imagen de la persona</label>
    <input name="valorImagen" type="file" class="form-control" id="exampleInputimg">
  </div>

  

  <div class="container_buttons">
            <button type="submit" class="btn boton btn-primary" name="insertar">Ingreso</button>
            <button type ="submit" class="btn boton btn-info" name="redirigir">Otras manipulaciones</button>
        </div>
</form>
</div> 


<?php include("./sectionsAdmin/footerAdmin.php"); ?>