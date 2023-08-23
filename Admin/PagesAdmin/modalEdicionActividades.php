<!-- Modal -->
<?php
require_once("controladorAdministrador/controladorAdmin.php");
if ($_POST && isset($_POST['editar'])) {
    if ($valores['identificador'] <= 1) {
        $nombre = $_POST['titulo'];
        $identificador =  $_POST['id'];
        $fecha_inicio = $_POST['fechaInicio'];
        $fecha_fin = $_POST['fechaFin'];
        $descripcion = $_POST['Descripcion'];
        $id_imagen = $_POST['id_imagen'];

        if($fecha_fin < $fecha_inicio) {
            echo "No se puede procesar";
        } else {
            $tiempo = new DateTime();
            if ($_FILES['valorImagen']['name'] != null) {
                $imagen = $tiempo->getTimestamp() . "_" . $_FILES['valorImagen']['name'];
                $ingresoImagen = $_FILES['valorImagen']['tmp_name'];
                //ingreso de foros
                move_uploaded_file($ingresoImagen, "../img/imagenesActividades/" . $imagen);
            } else {
                $imagen = $id_imagen;
            }
             manejoAdmin::editarActividadesControl($identificador,  $nombre, $fecha_inicio, $fecha_fin ,$descripcion, $imagen);
        }

      
      
    }
}
?>
<div class="modal fade" id="editChildresn<?php echo $valores['identificador']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edicion Actividades</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="formlogin need-validation was-validated" method="POST" enctype="multipart/form-data">
                <div class="col-md-10">

                <div class="mb-3">
                        <label for="nombreUsuario" class="form-label">Identificador de Actividad</label>
                        <input name="id" type="text" class="form-control" id="nombreUsuario" aria-describedby="nombreHelp" value="<?php echo $valores['identificador']; ?>" readonly>
                        
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="titulo">Nombre</label>
                        <input name="titulo" id="titulo" type="text" class="form-control" value="<?php echo $valores['nombre']; ?>" required="">
                        <div class="invalid-feedback">
                            Nombre requerido
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="Descripcion">Fecha de Inicio</label>
                        <input  name="fechaInicio" id="fechaInicio" type="date" class="form-control" value="<?php echo $valores['fecha_inicio']; ?>" required="" >
                        <div class="invalid-feedback">
                            Fecha de Inicio requerida
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="Descripcion">Fecha de Fin</label>
                        <input  name="fechaFin" id="fechaFin" type="date" class="form-control" value="<?php echo $valores['fecha_fin']; ?>" required="" >
                        <div class="invalid-feedback">
                            Fecha de Fin requerida
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="contenido">Descripcion</label>
                        <textarea name="Descripcion" class="form-control" id="Descripcion" rows="6" ><?php echo $valores['descripcion']; ?></textarea>
                    </div>
                    <div class="mb-3">
                    <label for="nombreUsuario" class="form-label">Identificador de imagen</label>
                    <input name="id_imagen" type="text" class="form-control" id="nombreUsuario" aria-describedby="nombreHelp" value="<?php echo $valores['imagen']; ?>" readonly>
                        
                    </div>
                    <div class="col-sm-12">
                        <label for="exampleInputImg" class="form-label">Imagen</label>
                        <input name="valorImagen" type="file" class="form-control" id="exampleInputimg"  value="<?php echo $valores['imagen']; ?>">
                    </div>

                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" name="editar">Guardar Edicion</button>
            </div>
            </form>
        </div>

    </div>
</div>
</div>