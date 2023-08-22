<?php
require_once("controladorAdministrador/controladorAdmin.php");
manejoAdmin::mostrarComentarios();

?>
<div class="container">
    <h1>Listado de Comentarios</h1>
    <hr />
</div>
<div class="col-md-12">
    <table class="table table-bordered  table-striped table-hover">
        <thead class="bg-primary text-white">
            <th>Identificador</th>
            <th>Correo</th>
            <th>Mensaje</th>
            <th>Identificador Noticia</th>
        </thead>
        <?php foreach (resultadoComentarios as $valores) { ?>

            <tr>
                <td><?php echo $valores['id'] ?></td>
                <td><?php echo $valores['correo'] ?></td>
                <td><?php echo $valores['mensaje'] ?></td>
                <td><?php echo $valores['comentario_noticia'] ?></td>
            </tr>
        <?php } ?>

    </table>
</div>