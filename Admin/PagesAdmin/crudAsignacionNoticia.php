<?php
require_once("controladorAdministrador/controladorAdmin.php");
//require_once("controladorAdministrador/controladorAdmin.php");
manejoAdmin::mostrarAsignacionesNoticias();
//eliminar

if ($_GET) {
    $elementoAEliminar = $_GET['botonEliminar'];
   // manejoAdmin::eliminarNoticias($elementoAEliminar);
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
            <th>Identificador Noticia</th>
            <th>Identificador Colaborador</th>
            <th>Fecha</th>
            <th>Area</th>
        </thead>
        <?php foreach (resultadoAsigacionesNoticias as $valores) { ?>

            <tr>
                <td><?php echo $valores['id'] ?></td>
                <td><?php echo $valores['identificadorNoticia'] ?></td>
                <td><?php echo $valores['identificadorColabo'] ?></td>
                <td><?php echo $valores['fecha'] ?></td>

                <td>
                <?php echo $valores['area'] ?>
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