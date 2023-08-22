<?php
include("./sections/header.php");
?>

<?php
require_once("controlador/manejo.php");
manejo::mostrarAsignacionesActividades();

?>

<!--

GENERACION DE CARDS PARA LAS NOTICIAS
-->
<div class="container">
    <div class="tituloColaboradores">
        <h2>Listado de Actividades</h2>
        <hr>
    </div>
    <!--GENERADOR DE CARTAS-->
    <div class="cardContainer">
        <div class="row">
            <?php foreach(resultadoAsigacionesActividades as $valores) {
                  $busquedaNoticias = manejo::buscarActividades_ActividadesId($valores['identificadorActividad']); 
                ?> 
                <div class="col-md-4 mb-4"> <!-- Cambia a col-md-6 si quieres 2 columnas -->
                    <div class="card d-flex flex-column align-items-center">
                        <img class="card-img-top" style="width: 60%;" src="./img/imagenesActividades/<?php echo $busquedaNoticias[0]['imagen']?>" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $busquedaNoticias[0]['nombre']?></h5>
                            <p class="card-text"><?php echo $busquedaNoticias[0]['resumen']?></p>
                            <p class="card-text"><small class="text-muted">Fecha de Realizacion</small></p>
                            <p class="card-text"><small class="text-muted"><?php echo $busquedaNoticias[0]['fecha_inicio']?>---<?php echo $busquedaNoticias[0]['fecha_fin']?></small></p>
                            <a href="direccionEspecificaActividad.php?identificador=<?php echo $busquedaNoticias[0]['identificador']?>" class="btn btn-primary" role="button" name="" id="">Ver Noticia</a>
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