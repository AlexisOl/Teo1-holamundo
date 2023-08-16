<?php
include("../db/conexion.php");
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
            <input name="valorPassword" type="password" class="form-control" id="exampleInputPassword">
        </div>

        <div class="mb-3">
            <label for="exampleInputTrabajo" class="form-label">Repita contrasenia</label>
            <input name="valorPassword2" type="password" class="form-control" id="exampleInputPasswordAgain">
        </div>


        <!--INGRESO DE botones -->


        <div class="container_buttons">
            <button type="submit" class="btn boton btn-info">Buscar</button>
            <button type="submit" class="btn boton  btn-warning">Editar</button>
            <button type="submit" class="btn boton btn-danger">Eliminar</button>

        </div>
    </form>
</div>