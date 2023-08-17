<?php
include("./sections/header.php");
?>
<?php
include("./db/conexion.php");
?>
<?php
//GENERA LA CONSULTA Y CONEXION 
 $conexionColaboradores = new conexion();
// $sentencia = $conexionColaboradores->consult("SELECT * FROM `COLABORADORES`");

?>

<div class="container">
    <div class="tituloColaboradores">
        <h2>Agenda de Actividades</h2>
        <hr>
    </div>
    <!--GENERADOR DE CARTAS-->
    <div class="cardContainer">
        <div class="row">
                <div class="col-md-4 mb-4"> <!-- Cambia a col-md-6 si quieres 2 columnas -->
                    <div class="card d-flex flex-column align-items-center">
                        <img class="card-img-top" style="width: 60%;" src="..." alt="">
                        <div class="card-body">
                            <h5 class="card-title">..</h5>
                            <p class="card-text">..</p>
                            <p class="card-text"><small class="text-muted">..</small></p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>


<?php
include("./sections/footer.php");
?>