<?php
require_once("controladorAdministrador/controladorAdmin.php");
//require_once("controladorAdministrador/controladorAdmin.php");
manejoAdmin::mostrarAsignacionesActividades();
//eliminar

if ($_GET) {
    $elementoAEliminar = $_GET['botonEliminar'];
   //manejoAdmin::eliminarNoticias($elementoAEliminar);
}

?>
<div class="container">
    <h1>Listado de Asignaciones</h1>
    <hr />
</div>
<div class="col-md-12">
    <table class="table table-bordered  table-striped table-hover">
        <thead class="bg-primary text-white">
            <th>Identificador</th>
            <th>Identificador Actividad</th>
            <th>Identificador Usuario</th>
            <th>Fecha</th>
            <th>Area</th>
        </thead>
        <?php foreach (resultadoAsigacionesActividades as $valores) { ?>

            <tr>
                <td><?php echo $valores['id'] ?></td>
                <td><?php echo $valores['identificadorActividad'] ?></td>
                <td><?php echo $valores['identificadorUsuario'] ?></td>
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