<?php
include("./sections/header.php");
?>

<?php
require_once("controlador/manejo.php");
manejo::mostrarActividades();

// Recibir el identificador de la noticia desde la URL
if (isset($_GET['identificador'])) {
    $idActividad = $_GET['identificador'];

    $busqueda = manejo::buscarActividadesAsignacionActividadesId($idActividad);
    $busquedaNoticia = manejo::buscarActividades_ActividadesId($idActividad);
    $busquedaColaborador = manejo::buscarUsuarioActividadesId($busqueda[0]['identificadorUsuario']);
}
?>
<main class="container">

    <div class="row">
        <div class="col md-10 blog-main">
            <article class="blog-post">
                <h2 class="blog-post-title"><?php echo $busquedaNoticia[0]['nombre'] ?></h2>
                <p class="blog-post-meta"> <?php echo $busqueda[0]['fecha'] ?></p>
                <p class="blog-post-meta"> Publicacion generada por: <?php echo $busquedaColaborador[0]['nombre'] ?> </p>
                <h3 class="mb-3">Resumen</h3>
                <aside class="col md-3 blog-sidebar">
                    <div class="p-3 mb-3 bg-light rounded">
                        <h4 class="font-italic">Area</h4>
                        <p class="mb-0"><?php echo $busqueda[0]['area'] ?></p>
                    </div>
                </aside>
                <h5 class="mb-3"><?php echo $busquedaNoticia[0]['descripcion'] ?></h5>
                <hr>
                <br>
                <div class="row g-5">
                    <h2 class="blog-post-title">Fecha de Realizacion</h2>
                    <div class="col-sm-6">
                        <h3 class="mb-3">Fecha de Inicio</h3>
                        <p class="mb-0"><?php echo $busquedaNoticia[0]['fecha_inicio'] ?></p>

                    </div>
                    <div class="col-sm-6">
                        <h3 class="mb-3"> Fecha de Fin</h3>

                        <p class="mb-0"><?php echo $busquedaNoticia[0]['fecha_fin'] ?></p>

                    </div>
                </div>
                <hr>
                <br>
                <h3 class="mb-3">Imagen del Evento</h3>
                <br>
                <img class="img-fluid" style="width: 100%;" src="./img/imagenesActividades/<?php echo $busquedaNoticia[0]['imagen'] ?>" alt="">

            </article>

        </div>

    </div>
</main>

<?php
include("./sections/footer.php");
?>