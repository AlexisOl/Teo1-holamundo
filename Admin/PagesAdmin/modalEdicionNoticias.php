<!-- Modal -->
<?php
require_once("controladorAdministrador/controladorAdmin.php");
if ($_POST && isset($_POST['editar'])) {
    if ($valores['id'] <= 1) {
        
        $titulo = $_POST['titulo'];
        $id =  $_POST['id'];
        $id_imagen = $_POST['id_imagen'];

        $tiempo = new DateTime();
           // $imagen =  $id_imagen;
            if ($_FILES['valorImagen']['name'] != null) {
                $imagen = $tiempo->getTimestamp() . "_" . $_FILES['valorImagen']['name'];
                $ingresoImagen = $_FILES['valorImagen']['tmp_name'];
                //ingreso de foros
                move_uploaded_file($ingresoImagen, "../img/imagenesNoticias/" . $imagen);
            } else {
                $imagen = $id_imagen;
            }
    
        $resumen = $_POST['Descripcion'];
        $general = $_POST['contenido'];
        manejoAdmin::editarNoticia($id, $titulo, $resumen, $general, $imagen);
    }
}
?>
<div class="modal fade" id="editChildresnNoticia<?php echo $valores['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edicion Noticia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="formlogin need-validation was-validated" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                        <label for="nombreUsuario" class="form-label">Identificador de Noticia</label>
                        <input name="id" type="text" class="form-control" id="nombreUsuario" aria-describedby="nombreHelp" value="<?php echo $valores['id']; ?>" readonly>
                        
                    </div>
                <div class="col-sm-12">

                    <label class="form-label" for="titulo">Titulo</label>
                    <input name="titulo" id="titulo" type="text" class="form-control"  value="<?php echo $valores['titulo']; ?>" required="">
                    <div class="invalid-feedback">
                        Titulo requerido
                    </div>
                </div>
            <div class="col-sm-12">
                <label class="form-label" for="Descripcion">Descripcion</label>
                <textarea name="Descripcion" class="form-control" id="Descripcion" rows="3"  required=""><?php echo $valores['resumen']; ?></textarea>
                <div class="invalid-feedback">
                    Descripcion requerida
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="contenido">Contenido</label>
                <textarea name="contenido" class="form-control" id="contenido" rows="6" required=""><?php echo $valores['general']; ?></textarea>
                <div class="invalid-feedback">
                    Contenido requerido
                </div>
            </div>

            <div class="mb-3">
                    <label for="nombreUsuario" class="form-label">Identificador de imagen</label>
                    <input name="id_imagen" type="text" class="form-control" id="nombreUsuario" aria-describedby="nombreHelp" value="<?php echo $valores['imagen']; ?>" readonly>
                        
                    </div>
            <div class="col-sm-12">
                <label for="exampleInputImg" class="form-label">Imagen</label>
                <input name="valorImagen" type="file" class="form-control" id="exampleInputimg" value="<?php echo $valores['imagen']; ?>">
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