<?php
session_start();
if (isset($_SESSION['valorUsuario']) != "alexxus") {
    header("location:/practica1-TS1/index.php");
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
    <style>
    .custom-align-left {
        margin-right: auto;
    }
</style>
</head>


<body>
    <!--generacion de la barra del header-->
    <div id="container-nav">
        <nav class="navbar navbar-expand" style="background-color:  #bcddb3;">
            <div class="container-fluid">
                <div class="nav navbar-nav">
                    <a class="nav-item nav-link" href="/practica1-TS1/generalAdmin.php">Inicio</a>
                    <!--OTRAS SECCIONES-->
                    <a class="nav-item nav-link" href="/practica1-TS1/Admin/direccionCreacionNoticia.php">Ingreso Noticias</a>
                    <a class="nav-item nav-link" href="/practica1-TS1/Admin/direccionAsignacionNoticia.php">Asignacion Noticias</a>
                    <a class="nav-item nav-link" href="/practica1-TS1/Admin/direccionCreacionActividad.php">Ingreso Actividades</a>
                    <a class="nav-item nav-link" href="/practica1-TS1/Admin/direccionAsigancionActividades.php">Asignacion Actividades</a>
                    <a class="nav-item nav-link" href="/practica1-TS1/Admin/direccionColaboradoresCrud.php">Ingreso Colaboradores</a>
                    <a class="nav-item nav-link" href="/practica1-TS1/Admin/direccionCreacionUser.php">Ingreso Usuarios</a>
                    <a class="nav-item nav-link" href="/practica1-TS1/Admin/direccionComentarios.php">Vista Comtentarios</a>
                    <div class="d-flex ml-auto   custom-align-left">
                        <a class="nav-item nav-link  " href="#"><?php echo $_SESSION['valorUsuario'] ?></a>
                        <a class="nav-item nav-link  align-left" href="#!">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <a class="nav-item nav-link  align-left" href="/practica1-TS1/Admin/cerrarSesionAdmin.php">Cerrar Sesion</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <br />
    <br />
    <div class="container">