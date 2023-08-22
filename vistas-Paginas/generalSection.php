<?php
include("./sections/header.php")
?>

<?php
require_once("controlador/manejo.php");
manejo::mostrarNoticias();
$valores = manejo::mostrarOrdenDescendenteNoticiasFinales();
manejo::mostrarActividades();
$valoresActividades = manejo::mostrarOrdenDescendenteActividadesFinales();
?>

<div id="carouselExample" class="carousel slide" style="width: 100%; max-width: none; margin: 0 auto; overflow: hidden;">
  <div class="carousel-inner">
    <div class="carousel-item active img-fluid c-item">
      <img src="img/297648101_593712358792974_3713569649261653436_n.jpg" class="d-block w-100 c-img" alt="...">
    </div>
    <div class="carousel-item img-fluid  c-item">
      <img src="img/363942603_821473356016872_6131860330524636308_n.jpg" class="d-block w-100 c-img" alt="...">
    </div>
    <div class="carousel-item img-fluid  c-item">
      <img src="img/357051928_804965434334331_4930368429363161625_n.jpg" class="d-block w-100 c-img" alt="...">
    </div>
    <div class="carousel-item img-fluid  c-item">
      <img src="img/324251304_1244816273082653_3708319325678758174_n.jpg" class="d-block w-100 c-img" alt="...">
    </div>
    <div class="carousel-item img-fluid  c-item">
      <img src="img/304834807_611986106965599_4442840840628481455_n.jpg" class="d-block w-100 c-img" alt="...">
    </div>
    <div class="carousel-item img-fluid  c-item">
      <img src="img/334164901_620743696552263_8596543425567305008_n.jpg" class="d-block w-100 c-img" alt="...">
    </div>
  </div>



  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<hr />
<div class="p-5 bg-light">
  <div class="container">
    <h1 class="display-3" style="color:black;">Informacion</h1>
    <hr class="barra">
  </div>
</div>
<br />
<br />


<!--GENERADOR DE CARTAS NOTICIAS | COLABORADORES-->
<main class="container">

  <div class="row">
    <div class="col md-8 blog-main">
      <h2>Noticias Mas Recientes</h2>
      <div class="cardContainer">
        <div class="row">
          <?php
          for ($i = 0; $i < 3 && $i < count($valores); $i++) {
            $valor = $valores[$i];
            $busquedaNoticias = manejo::buscarNoticia_NoticiaId($valor['identificadorNoticia']);
          ?>
            <div class="col-md-4 mb-4"> <!-- Cambia a col-md-6 si quieres 2 columnas -->
              <div class="card d-flex flex-column align-items-center">
                <img class="card-img-top" style="width: 60%;" src="./img/imagenesNoticias/<?php echo $busquedaNoticias[0]['imagen'] ?>" alt="">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $busquedaNoticias[0]['titulo'] ?></h5>
                  <p class="card-text"><?php echo $busquedaNoticias[0]['resumen'] ?></p>
                  <a href="direccionEspecificaNoticias.php?id=<?php echo $busquedaNoticias[0]['id'] ?>" class="btn btn-primary" role="button" name="" id="">Ver Noticia</a>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col md-8 blog-main">
      <h2>Actividades Mas Recientes</h2>
      <div class="cardContainer">
        <div class="row">
          <?php
          for ($i = 0; $i < 2 && $i < count($valoresActividades); $i++) {
            $valor = $valoresActividades[$i];
            $busquedaNoticias = manejo::buscarActividades_ActividadesId($valor['identificadorActividad']);
          ?>
            <div class="col-md-6 mb-4"> <!-- Cambia a col-md-6 si quieres 2 columnas -->
              <div class="card d-flex flex-column align-items-center">
                <img class="card-img-top" style="width: 60%;" src="./img/imagenesActividades/<?php echo $busquedaNoticias[0]['imagen'] ?>" alt="">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $busquedaNoticias[0]['nombre'] ?></h5>
                  <p class="card-text"><?php echo $busquedaNoticias[0]['resumen'] ?></p>
                  <p class="card-text"><small class="text-muted">Fecha de Realizacion</small></p>
                  <p class="card-text"><small class="text-muted"><?php echo $busquedaNoticias[0]['fecha_inicio'] ?>---<?php echo $busquedaNoticias[0]['fecha_fin'] ?></small></p>
                  <a href="direccionEspecificaActividad.php?identificador=<?php echo $busquedaNoticias[0]['identificador'] ?>" class="btn btn-primary" role="button" name="" id="">Ver Noticia</a>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>
</main>



<?php include("./sections/footer.php") ?>