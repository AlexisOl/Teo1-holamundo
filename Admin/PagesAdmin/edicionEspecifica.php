<?php
require_once("controladorAdministrador/controladorAdmin.php");
//require_once("controladorAdministrador/controladorAdmin.php");
manejoAdmin::mostrarUsuario();
//eliminar


?>

<div class="container_usuarios">
    <!--INFO -->
    <div class="infoText">
        <h1>Edicion de Usuarios</h1>
        <hr>
    </div>
    <!--INGRESO DE LOGIN -->
    <form class="formlogin" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombreUsuario" class="form-label">Nombre de Usuario</label>
            <input name="valorUsuario" type="text" class="form-control" id="nombreUsuario" aria-describedby="nombreHelp" value="<?php echo $nombreUser ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputAreaInv" class="form-label">Contrasenia</label>
            <input name="valorPassword" type="text" class="form-control" id="exampleInputPassword" value="<?php echo $password ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputTrabajo" class="form-label">Repita contrasenia</label>
            <input name="valorPassword2" type="text" class="form-control" id="exampleInputPasswordAgain" value="<?php echo $password ?>">
        </div>


        <!--INGRESO DE botones -->


   
</div>