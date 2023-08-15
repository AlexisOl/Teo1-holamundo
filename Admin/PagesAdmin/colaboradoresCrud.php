
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
  $sql ="INSERT INTO `COLABORADORES` (`identificadorColaborador`, `nombre`, `areaInvestigacion`, `areaTrabajo`, `imagen`) VALUES (NULL, 'June Huh', 'Algebra diferencial', 'Investigador', 'img4.jpg');";
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
    <label for="exampleInputPassword1" class="form-label">Area de Investigacion</label>
    <input name="valorContraseña" type="password" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Area de Trabajo</label>
    <input name="valorContraseña" type="password" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Imagen de la persona</label>
    <input name="valorContraseña" type="file" class="form-control" id="exampleInputPassword1">
  </div>

  
  <button type="submit" class="btn btn-primary">Ingreso</button>
</form>
</div> 


<?php include("./sectionsAdmin/footerAdmin.php"); ?>