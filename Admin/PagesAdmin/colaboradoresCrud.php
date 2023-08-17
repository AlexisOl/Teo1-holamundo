
<?php
 include("./sectionsAdmin/headerAdmin.php");
  ?>




<!--CRUD PARA LOS COLABORADORES-->
<?php
include("../db/conexion.php");
?>

<?php

if ($_POST) {
  $nuevaconexion = new conexion();

  // AHORA CADA VALOR 

  $nombre = $_POST['valorUsuario'];

  $tiempo = new DateTime();

  $imagen =$tiempo->getTimestamp()."_".$_FILES['valorImagen']['name'];
  $ingresoImagen =$_FILES['valorImagen']['tmp_name'];
  //ingreso de foros
  move_uploaded_file($ingresoImagen,"../img/imagenesColaboradores/".$imagen);
  
  $areaInv = $_POST['valorAreaInv'];
  $areaTrabajo = $_POST['valorTrabajo'];

  $sql ="INSERT INTO `COLABORADORES` (`identificadorColaborador`, `nombre`, `areaInvestigacion`, `areaTrabajo`, `imagen`) VALUES (NULL, '$nombre', '$areaInv', '$areaTrabajo', '$imagen');";
  $nuevaconexion->ejecucion($sql);
  echo "conexion exitosa";
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
    <input name="valorUsuario" type="text" class="form-control" id="nombreUsuario" aria-describedby="nombreHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputAreaInv" class="form-label">Area de Investigacion</label>
    <input name="valorAreaInv" type="text" class="form-control" id="exampleInputAreaInv">
  </div>

  <div class="mb-3">
    <label for="exampleInputTrabajo" class="form-label">Area de Trabajo</label>
    <input name="valorTrabajo" type="text" class="form-control" id="exampleInputTrabajo">
  </div>

  <div class="mb-3">
    <label for="exampleInputImg" class="form-label">Imagen de la persona</label>
    <input name="valorImagen" type="file" class="form-control" id="exampleInputimg">
  </div>

  
  <button type="submit" class="btn btn-primary">Ingreso</button>
</form>
</div> 


<?php include("./sectionsAdmin/footerAdmin.php"); ?>