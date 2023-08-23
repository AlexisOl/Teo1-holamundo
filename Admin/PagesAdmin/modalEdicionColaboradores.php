<!-- Modal -->
<?php 
require_once("controladorAdministrador/controladorAdmin.php");
if ($_POST && isset($_POST['editar'])) {
    if ($valores['identificadorColaborador'] <=1) {
         
            $nombre = $_POST['valorUsuario'];
            $valorId=  $_POST['valorColab'];
            $id_imagen = $_POST['id_imagen'];


        $tiempo = new DateTime();
        if($_FILES['valorImagen']['name'] != null) {
        $imagen =$tiempo->getTimestamp()."_".$_FILES['valorImagen']['name'];
        $ingresoImagen =$_FILES['valorImagen']['tmp_name'];
        //ingreso de foros
        move_uploaded_file($ingresoImagen,"../img/imagenesColaboradores/".$imagen);
        } else{
        $imagen =$id_imagen;

        }
        $areaInv = $_POST['valorAreaInv'];
        $areaTrabajo = $_POST['valorTrabajo'];
        manejoAdmin::editarColaborador($valorId, $nombre, $areaInv, $areaTrabajo, $imagen);
        
    }


}
?>
<div class="modal fade" id="editChildresn<?php echo $valores['identificadorColaborador']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edicion Colaborador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="formlogin need-validation was-validated" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                        <label for="nombreUsuario" class="form-label">Identificaro de Colaborador</label>
                        <input name="valorColab" type="text" class="form-control" id="nombreUsuario" aria-describedby="nombreHelp" value="<?php echo $valores['identificadorColaborador']; ?>" readonly>
                        
                    </div>
                    <div class="mb-3">
                        <label for="nombreUsuario" class="form-label">Nombre de Colaborador</label>
                        <input name="valorUsuario" type="text" class="form-control" id="nombreUsuario" aria-describedby="nombreHelp" value="<?php echo $valores['nombre'];?>" required="">
                        <div class="invalid-feedback">
                            Nombre requerido
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputAreaInv" class="form-label">Area de Investigacion</label>
                        <input name="valorAreaInv" type="text" class="form-control" id="exampleInputAreaInv" value="<?php echo $valores['areaInvestigacion']; ?>" required="">

                        <div class="invalid-feedback">
                            Area de Investigacion requerida
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTrabajo" class="form-label">Area de Trabajo</label>
                        <input name="valorTrabajo" type="text" class="form-control" id="exampleInputTrabajo" value="<?php echo $valores['areaTrabajo']; ?>" required="">
                        <div class="invalid-feedback">
                            Trabajo requerido
                        </div>
                    </div>
                    <div class="mb-3">
                    <label for="nombreUsuario" class="form-label">Identificador de imagen</label>
                    <input name="id_imagen" type="text" class="form-control" id="nombreUsuario" aria-describedby="nombreHelp" value="<?php echo $valores['imagen']; ?>" readonly>
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputImg" class="form-label">Imagen de la persona</label>
                        <input name="valorImagen" type="file" class="form-control" id="exampleInputimg" value="<?php echo $valores['imagen']; ?>">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary"  name="editar">Guardar Edicion</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>