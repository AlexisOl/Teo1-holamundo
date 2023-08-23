<?php
require_once("controladorAdministrador/controladorAdmin.php");
//require_once("controladorAdministrador/controladorAdmin.php");
manejoAdmin::mostrarActividades();
//eliminar

if ($_GET) {
    $elementoAEliminar = $_GET['botonEliminar'];
    manejoAdmin::eliminarActividades($elementoAEliminar);
}

?>
<div class="container">
    <h1>Listado de Actividades sin enlaces</h1>
    <hr />
</div>
<div class="col-md-12">
    <table class="table table-bordered  table-striped table-hover">
        <thead class="bg-primary text-white">
            <th>Identificador</th>
            <th>Titulo de Actividad</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Fin</th>
            <th>Descripcion</th>
            <th>Imagen</th>
        </thead>
        <?php foreach (resultadoActividades as $valores) { ?>

            <tr>
                <td><?php echo $valores['identificador'] ?></td>
                <td><?php echo $valores['nombre'] ?></td>
                <td><?php echo $valores['fecha_inicio'] ?></td>
                <td><?php echo $valores['fecha_fin'] ?></td>
                <td><?php echo $valores['descripcion'] ?></td>
                <td>
                        <img class="card-img-top" style="width: 250px; height: 250px" src="../img/imagenesActividades/<?php echo $valores['imagen'] ?>" alt="">

                </td>

                <td>
                    <div class="container_buttons">
                        <a href="?botonEditar=<?php echo $valores['identificador']; ?>" data-bs-target="#editChildresn<?php echo $valores['identificador']; ?>" data-bs-toggle="modal" name="botonEditar" class="btn btn-warning">Editar</a>
                        <a href="?botonEliminar=<?php echo $valores['identificador']; ?>" class="btn btn-danger">Eliminar</a>
                    </div>
                </td>
            </tr>
            <?php
        //para que jale el modal de edicion
        include('modalEdicionActividades.php');?>
        <?php } ?>

    </table>
</div>