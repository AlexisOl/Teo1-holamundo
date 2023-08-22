<?php
include("./sections/header.php");
?>

<?php
require_once("controlador/manejo.php");
manejo::mostrarNoticias();

// Recibir el identificador de la noticia desde la URL
if (isset($_GET['id'])) {
    $idNoticia = $_GET['id'];
    $busqueda = manejo::buscarNoticiaAsignacion_NoticiaId($idNoticia);
    $busquedaNoticia = manejo::buscarNoticia_NoticiaId($idNoticia);
    $busquedaColaborador = manejo::buscarColaborador_NoticiaId($busqueda[0]['identificadorColabo']);
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["envioComentario"])) {
        // Procesar el formulario de comentarios aquí
        $correo = $_POST['correo'];
        $mensaje = $_POST['mensaje'];
        manejo::ingresoComentarios($correo, $mensaje, $idNoticia);
        echo $mensaje.$idNoticia;
    }
    

}
?>
<main class="container">

    <div class="row">
        <div class="col md-8 blog-main">
            <article class="blog-post">
                <h2 class="blog-post-title"><?php echo $busquedaNoticia[0]['titulo'] ?></h2>
                <p class="blog-post-meta"> <?php echo $busqueda[0]['fecha'] ?></p>
                <p class="blog-post-meta"> Realizado por: <?php echo $busquedaColaborador[0]['nombre'] ?> </p>
                <h3 class="mb-3">Resumen</h3>
                <h5 class="mb-3"><?php echo $busquedaNoticia[0]['resumen'] ?></h5>
                <hr>
                <br>
                <h3 class="mb-3">Contenido</h3>
                <h5 class="mb-3"><?php echo $busquedaNoticia[0]['general'] ?></h5>
                <br>
                <img class="img-fluid" style="width: 60%;" src="./img/imagenesNoticias/<?php echo $busquedaNoticia[0]['imagen'] ?>" alt="">

            </article>

        </div>
        <aside class="col md-3 blog-sidebar">
            <div class="p-3 mb-3 bg-warning rounded">
                <h4 class="font-italic">Area</h4>
                <p class="mb-0"><?php echo $busqueda[0]['area'] ?></p>
            </div>
            <div class="mb-3">
                <h4 class="mb-3">Ingrese el identificador del colaborador</h4>

                <div class="wrapper">
                    <form class="needs-validation was-validated " method="post">
                        <div class="row g-5">
                            <div class="col-sm-6">
                                <label class="form-label" for="identificador">Correo</label>
                                <input name="correo" id="correo" type="text" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Correo requerido
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label" for="contenido">Mensaje</label>
                                <textarea name="mensaje" class="form-control" id="mensaje" rows="6" required=""></textarea>
                                <div class="invalid-feedback">
                                   Mensaje requerido
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <button class="w-100 btn btn-success btn-md" type="submit" name="envioComentario">Enviar Comentario</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </aside>
    </div>
</main>

<?php
include("./sections/footer.php");
?>