<?php
include("./sections/header.php");
?>

<?php
require_once("controlador/manejo.php");
manejo::mostrarAsignacionesNoticias();

?>

<!--

GENERACION DE CARDS PARA LAS NOTICIAS
-->
<div class="container">
    <div class="tituloColaboradores">
        <h2>Listado de Noticias</h2>
        <hr>
    </div>
    <!--GENERADOR DE CARTAS-->
    <div class="cardContainer">
        <div class="row">
            <?php foreach(resultadoAsigacionesNoticias as $valores) {
                  $busquedaNoticias = manejo::buscarNoticia_NoticiaId($valores['identificadorNoticia']); 
                ?> 
                <div class="col-md-4 mb-4"> <!-- Cambia a col-md-6 si quieres 2 columnas -->
                    <div class="card d-flex flex-column align-items-center">
                        <img class="card-img-top" style="width: 60%;" src="./img/imagenesNoticias/<?php echo $busquedaNoticias[0]['imagen']?>" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $busquedaNoticias[0]['titulo']?></h5>
                            <p class="card-text"><?php echo $busquedaNoticias[0]['resumen']?></p>
                            <a href="direccionEspecificaNoticias.php?id=<?php echo $busquedaNoticias[0]['id']?>" class="btn btn-primary" role="button" name="" id="">Ver Noticia</a>
                        </div>
                    </div>
                </div>
            <?php }?> 
        </div>
    </div>
</div>


<?php
include("./sections/footer.php");
?>