<?php
include("./sections/header.php");
?>
<?php
include("./db/conexion.php");
?>
<?php
//GENERA LA CONSULTA Y CONEXION 
 $conexionColaboradores = new conexion();
 $sentencia = $conexionColaboradores->consult("SELECT * FROM `NOTICIAS`");

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
            <?php foreach($sentencia as $valores) {?> 
                <div class="col-md-4 mb-4"> <!-- Cambia a col-md-6 si quieres 2 columnas -->
                    <div class="card d-flex flex-column align-items-center">
                        <img class="card-img-top" style="width: 60%;" src="./img/imagenesColaboradores/<?php echo $valores['imagen']?>" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $valores['nombre']?></h5>
                            <p class="card-text"><?php echo $valores['areaInvestigacion']?></p>
                            <p class="card-text"><small class="text-muted"><?php echo $valores['areaTrabajo']?></small></p>
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