<?php
include("../db/conexion.php");
?>
<?php
//GENERA LA CONSULTA Y CONEXION 
 $conexionColaboradores = new conexion();
 $sentencia = $conexionColaboradores->consult("SELECT * FROM `COLABORADORES`");

?>
<div class="col-md-12">
    <table class="table table-bordered  table-striped table-hover">
        <thead  class="bg-primary text-white">
            <th>Identificador</th>
            <th>nombre</th>
            <th>Area de Investigacion</th>
            <th>Area de Trabajo</th>
            <th>Imagen</th>
            <th>Opciones</th>
        </thead>
        <?php foreach($sentencia as $valores) {?> 

        <tr>
            <td><?php echo $valores['identificadorColaborador']?></td>
            <td><?php echo $valores['nombre']?></td>
            <td><?php echo $valores['areaInvestigacion']?></td>
            <td><?php echo $valores['areaTrabajo']?></td>
            <td><img class="card-img-top" style="width: 250px; height: 250px" src="../img/imagenesColaboradores/<?php echo $valores['imagen']?>" alt=""></td>
            <td>
                <form method="post">
                    <input type="submit" name="botonEditar" class="btn btn-warning" value="Editar">
                    <input type="submit" name="botonEliminar" class="btn btn-danger" value="Eliminar">
                </form>
            </td>
        </tr>
        <?php }?> 

    </table>
</div>