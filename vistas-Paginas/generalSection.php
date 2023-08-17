<?php
 include("./sections/header.php")
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
        <img src="img/324251304_1244816273082653_3708319325678758174_n.jpg"  class="d-block w-100 c-img" alt="...">  
    </div>
    <div class="carousel-item img-fluid  c-item">
        <img src="img/304834807_611986106965599_4442840840628481455_n.jpg"  class="d-block w-100 c-img" alt="...">  
    </div>
    <div class="carousel-item img-fluid  c-item">
        <img src="img/334164901_620743696552263_8596543425567305008_n.jpg"  class="d-block w-100 c-img" alt="...">  
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
<hr/>
<div class="p-5 bg-light">
  <div class="container">
    <h1 class="display-3" style="color:black;">Informacion</h1>
    <hr class="barra">
  </div>
</div>



    <!--GENERADOR DE CARTAS NOTICIAS | COLABORADORES-->
    <div class="cardContainer">
        <div class="row">
                <div class="col-md-6 mb-6"> <!-- Cambia a col-md-6 si quieres 2 columnas -->
                    <div class="card d-flex flex-column align-items-center">
                        <img class="card-img-top" style="width: 60%;" src="..." alt="">
                        <div class="card-body">
                            <h5 class="card-title">Conoce las ultimas Noticias</h5>
                            <p class="card-text">..</p>
                            <p class="card-text"><small class="text-muted">..</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-6"> <!-- Cambia a col-md-6 si quieres 2 columnas -->
                    <div class="card d-flex flex-column align-items-center">
                        <img class="card-img-top" style="width: 60%;" src="..." alt="">
                        <div class="card-body">
                            <h5 class="card-title">Conoce a nuestros Colaboradore</h5>
                            <p class="card-text">..</p>
                            <p class="card-text"><small class="text-muted">..</small></p>
                        </div>
                    </div>
                </div>
        </div>
    </div>

<?php include("./sections/footer.php") ?>