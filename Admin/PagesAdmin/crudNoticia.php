<?php
require_once("controladorAdministrador/controladorAdmin.php");
//require_once("controladorAdministrador/controladorAdmin.php");
manejoAdmin::mostrarNoticias();
//eliminar

if ($_GET) {
    $elementoAEliminar = $_GET['botonEliminar'];
    manejoAdmin::eliminarNoticias($elementoAEliminar);
}

?>
<div class="container">
    <h1>Listado de Noticias sin enlaces</h1>
    <hr />
</div>
<div class="col-md-12">
    <table class="table table-bordered  table-striped table-hover">
        <thead class="bg-primary text-white">
            <th>Identificador</th>
            <th>Titulo</th>
            <th>Resumen</th>
            <th>General</th>
            <th>Imagen</th>
        </thead>
        <?php foreach (resultadoNoticias as $valores) { ?>

            <tr>
                <td><?php echo $valores['id'] ?></td>
                <td><?php echo $valores['titulo'] ?></td>
                <td><?php echo $valores['resumen'] ?></td>
                <td><?php echo $valores['general'] ?></td>

                <td>
                        <img class="card-img-top" style="width: 250px; height: 250px" src="../img/imagenesNoticias/<?php echo $valores['imagen'] ?>" alt="">

                </td>


                <td>
                    <div class="container_buttons">
                        <input type="submit" name="botonEditar" class="btn btn-warning" value="Editar">
                        <a href="?botonEliminar=<?php echo $valores['id']; ?>" class="btn btn-danger">Eliminar</a>
                    </div>
                </td>
            </tr>
        <?php } ?>

    </table>
</div>