<?php
require_once("controladorAdministrador/controladorAdmin.php");
//require_once("controladorAdministrador/controladorAdmin.php");

//buscar
if ($_POST) {
    if (isset($_POST["buscar"])) {
        $elementoABuscar = $_POST['identificador'];
        $busqueda = manejoAdmin::buscarColaboradorId($elementoABuscar);
        print_r($busqueda);
    }
}

?>

<div class="row g-5">
    <div class="py-5 text-center">
        <h1>Ingreso de Noticias</h1>
        <hr />
    </div>
    <div class="col-lg-16 row-md-10">
        <h4 class="mb-3">Ingrese el identificador del colaborador</h4>
        <form class="needs-validation was-validated " method="post">
            <div class="row g-5">
                <div class="col-sm-6">
                    <label class="form-label" for="identificador">Identificador</label>
                    <input name="identificador" id="identificador" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                        Identificador requerido
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input id="nombre" type="text" class="form-control" value="<?php echo isset($busqueda[0]['nombre']) ? $busqueda[0]['nombre'] : 'nada'; ?>" readonly>

                </div>

                <div class="col-sm-5">
                    <button class="w-100 btn btn-primary btn-md" type="submit" name="buscar">Buscar</button>
                </div>
            </div>
        </form>
        <hr class="my-4" />
        <form class="needs-validation was-validated " method="post" enctype="multipart/form-data">
            <div class="row g-5">
                <h4 class="mb-3">Ingrese la informacion de la Noticias</h4>
                <div class="col-md-10">
                    <div class="col-sm-12">
                        <label class="form-label" for="titulo">Titulo</label>
                        <input id="titulo" type="text" class="form-control" required="">
                        <div class="invalid-feedback">
                            Titulo requerido
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="Descripcion">Descripcion</label>
                        <textarea class="form-control" id="Descripcion" rows="3" required=""></textarea>
                        <div class="invalid-feedback">
                            Descripcion requerida
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="contenido">Contenido</label>
                        <textarea class="form-control" id="contenido" rows="6" required=""></textarea>
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
            <button class="w-100 btn btn-primary btn-md" type="submit" name="buscar">Buscar</button>
        </form>
        <hr class="my-4" />
        <button class="w-100 btn btn-primary btn-md" type="submit" name="buscar">Guardar Informacion Global</button>

    </div>
</div>