<?php
require_once("controladorAdministrador/controladorAdmin.php");
//require_once("controladorAdministrador/controladorAdmin.php");

//buscar
if ($_POST) {

    if (isset($_POST["guardar_noticia"])) {
        $titulo = $_POST['titulo'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        $Descripcion = $_POST['Descripcion'];
        if($fechaFin < $fechaInicio) {
            echo "No se puede procesar";
        } else {
            $tiempo = new DateTime();
            if($_FILES['valorImagen']['name'] != null) {
              $imagen =$tiempo->getTimestamp()."_".$_FILES['valorImagen']['name'];
              $ingresoImagen =$_FILES['valorImagen']['tmp_name'];
              //ingreso de foros
              move_uploaded_file($ingresoImagen,"../img/imagenesActividades/".$imagen);
            } else{
              $imagen =null;
        
            }
                manejoAdmin::ingresoActividades($titulo, $fechaInicio, $fechaFin , $Descripcion, $imagen);
        }
  
   
    }  elseif (isset($_POST["redirigir"])) {
     
        // Redirige después de insertar los datos
        header("Location: /practica1-TS1/Admin/direccionEdicionActividades.php");
        exit(); // Asegurarse de que no haya más ejecución de código después de la redirección
    }
}


?>

<div class="row g-5">
    <div class="py-5 text-center">
        <h1>Ingreso de Actividades</h1>
        <hr />
    </div>
    <div class="col-lg-16 row-md-10">
        <form class="needs-validation was-validated " method="post" enctype="multipart/form-data">
            <div class="row g-5">
                <h4 class="mb-3">Ingrese la informacion de la Actividad</h4>
                <div class="col-md-10">
                    <div class="col-sm-12">
                        <label class="form-label" for="titulo">Nombre</label>
                        <input name="titulo" id="titulo" type="text" class="form-control" required="">
                        <div class="invalid-feedback">
                            Nombre requerido
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="Descripcion">Fecha de Inicio</label>
                        <input  name="fechaInicio" id="fechaInicio" type="date" class="form-control"  required="" >
                        <div class="invalid-feedback">
                            Fecha de Inicio requerida
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="Descripcion">Fecha de Fin</label>
                        <input  name="fechaFin" id="fechaFin" type="date" class="form-control"  required="" >
                        <div class="invalid-feedback">
                            Fecha de Fin requerida
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="contenido">Descripcion</label>
                        <textarea name="Descripcion" class="form-control" id="Descripcion" rows="6" ></textarea>
                    </div>
                    <div class="col-sm-12">
                        <label for="exampleInputImg" class="form-label">Imagen</label>
                        <input name="valorImagen" type="file" class="form-control" id="exampleInputimg"  required="">
                    </div>
                    <div class="invalid-feedback">
                            Imagen requerida
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
            <h2 class="mb-3">Informacion General Para la Creacion De Actividades</h2>
            <hr>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h4 class="mb-3">Informacion Actividad</h4>
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <th>Titulo de Actividad</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Fin</th>
                            <th>Descripcion</th>
                            <th>Imagen</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $titulo ?></td>
                                <td><?php echo $fechaInicio ?></td>
                                <td><?php echo $fechaFin ?></td>
                                <td><?php echo $Descripcion ?></td>
                                <td>
                        <img class="card-img-top" style="width: 250px; height: 250px" src="../img/imagenesActividades/<?php echo $imagen?>" alt="">

                         </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

    </div>
</div>
