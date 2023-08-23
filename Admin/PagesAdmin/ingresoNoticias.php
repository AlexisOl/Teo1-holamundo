<?php
require_once("controladorAdministrador/controladorAdmin.php");
//require_once("controladorAdministrador/controladorAdmin.php");

//buscar
if ($_POST) {
    $titulo = $_POST['titulo'];
    $descripcion = "";
    $contenido = "";
    $imagen = "";

    if (isset($_POST["buscar"])) {
        $elementoABuscar = $_POST['identificador'];
        $busqueda = manejoAdmin::buscarColaboradorId($elementoABuscar);
        print_r($busqueda);

        
    } elseif (isset($_POST["guardar_noticia"])) {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['Descripcion'];
        $contenido = $_POST['contenido'];

        $tiempo = new DateTime();
        if($_FILES['valorImagen']['name'] != null) {
          $imagen =$tiempo->getTimestamp()."_".$_FILES['valorImagen']['name'];
          $ingresoImagen =$_FILES['valorImagen']['tmp_name'];
          //ingreso de foros
          move_uploaded_file($ingresoImagen,"../img/imagenesNoticias/".$imagen);
        } else{
          $imagen =null;
    
        }
            manejoAdmin::ingresoNoticias($titulo, $descripcion, $contenido, $imagen);
   
    }  elseif (isset($_POST["redirigir"])) {
     
        // Redirige después de insertar los datos
        header("Location: /practica1-TS1/Admin/direccionEdicionNoticia.php");
        exit(); // Asegurarse de que no haya más ejecución de código después de la redirección
    }
}


?>

<div class="row g-5">
    <div class="py-5 text-center">
        <h1>Ingreso de Noticias</h1>
        <hr />
    </div>
    <div class="col-lg-16 row-md-10">
        <form class="needs-validation was-validated " method="post" enctype="multipart/form-data">
            <div class="row g-5">
                <h4 class="mb-3">Ingrese la informacion de la Noticias</h4>
                <div class="col-md-10">
                    <div class="col-sm-12">
                        <label class="form-label" for="titulo">Titulo</label>
                        <input name="titulo" id="titulo" type="text" class="form-control" required="">
                        <div class="invalid-feedback">
                            Titulo requerido
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="Descripcion">Descripcion</label>
                        <textarea name="Descripcion" class="form-control" id="Descripcion" rows="3" required=""></textarea>
                        <div class="invalid-feedback">
                            Descripcion requerida
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="contenido">Contenido</label>
                        <textarea name="contenido" class="form-control" id="contenido" rows="6" required=""></textarea>
                        <div class="invalid-feedback">
                            Contenido requerido
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="exampleInputImg" class="form-label">Imagen</label>
                        <input name="valorImagen" type="file" class="form-control" id="exampleInputimg">
                    </div>

                </div>
            </div>
            <br>
            <br>
            <div id="liveAlertPlaceholder"></div>

            <div class="botones">
                <button class="w-100 btn btn-primary btn-md" type="submit" name="guardar_noticia">Guardar Noticia</button>
                <br>
                <br>
                <br>
                <button type ="submit" class="btn boton btn-info w-100" name="redirigir" formnovalidate>Vista Especifica</button>


            </div>
        </form>

        <hr class="my-4" />
        <br>
        <br>
        <br>
        <br>

        <div class="col-lg-16 row-md-10">
            <h2 class="mb-3">Informacion General Para la Creacion De Noticias</h2>
            <hr>
            <br>
            <div class="row">
            
                <div class="col-md-6">
                    <h4 class="mb-3">Informacion Noticias</h4>
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Contenido</th>
                            <th>Image</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $titulo ?></td>
                                <td><?php echo $descripcion ?></td>
                                <td><?php echo $contenido ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
