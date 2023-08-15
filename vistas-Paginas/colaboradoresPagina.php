<?php
include("./sections/header.php");
?>
<?php
include("./db/conexion.php");
?>
<?php
//GENERA LA CONSULTA Y CONEXION 
 $conexionColaboradores = new conexion();
 $sentencia = $conexionColaboradores->consult("SELECT * FROM `COLABORADORES`");

?>

<div class="container">
    <div class="tituloColaboradores">
        <h2>Listado de Colaboradores</h2>
        <hr>
    </div>
    <!--GENERADOR DE CARTAS-->
    <div class="cardContainer">
        <div class="row">
            <?php foreach($sentencia as $valores) {?> 
                <div class="col-md-4 mb-4"> <!-- Cambia a col-md-6 si quieres 2 columnas -->
                    <div class="card">
                        <img class="card-img-top" src="..." alt="<?php echo $valores['imagen']?>">
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