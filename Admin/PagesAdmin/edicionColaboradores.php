<?php
require_once("controladorAdministrador/controladorAdmin.php");
//require_once("controladorAdministrador/controladorAdmin.php");
manejoAdmin::mostrarCOlaboradores();
//eliminar

if ($_GET) {
    if($_GET['botonEliminar']) {
        $elementoAEliminar = $_GET['botonEliminar'];
        manejoAdmin::eliminarColaborador($elementoAEliminar);
    } elseif($_GET['botonEditar']){

    }
   
}

?>
<div class="container">
    <h1>Listado de Colaboradores</h1>
    <hr />
</div>
<div class="col-md-12">
    <table class="table table-bordered  table-striped table-hover">
        <thead class="bg-primary text-white">
            <th>Identificador</th>
            <th>nombre</th>
            <th>Area de Investigacion</th>
            <th>Area de Trabajo</th>
            <th>Imagen</th>
            <th>Opciones</th>
        </thead>
        <?php foreach (resultado as $valores) { ?>

            <tr>
                <td><?php echo $valores['identificadorColaborador'] ?></td>
                <td><?php echo $valores['nombre'] ?></td>
                <td><?php echo $valores['areaInvestigacion'] ?></td>
                <td><?php echo $valores['areaTrabajo'] ?></td>

                <td>
                    <?php if ($valores['imagen'] == null) { ?>
                        <img class="card-img-top" style="width: 250px; height: 250px" src="../img/imagenNulaColaborador/imgNull.jpg" alt="">
                    <?php } else { ?>
                        <img class="card-img-top" style="width: 250px; height: 250px" src="../img/imagenesColaboradores/<?php echo $valores['imagen'] ?>" alt="">
                    <?php } ?>

                </td>


                <td>
                    <div class="container_buttons">
                    <a href="?botonEditar=<?php echo $valores['identificadorColaborador']; ?>" data-bs-target="#editChildresn<?php echo $valores['identificadorColaborador']; ?>" data-bs-toggle="modal" name="botonEditar" class="btn btn-warning">Editar</a>
                    <a href="?botonEliminar=<?php echo $valores['identificadorColaborador']; ?>" class="btn btn-danger">Eliminar</a>
                    </div>
                </td>
            </tr>
            <?php
        //para que jale el modal de edicion
        include('modalEdicionColaboradores.php');?>
      
      <?php } ?>
        
      

    </table>
</div>