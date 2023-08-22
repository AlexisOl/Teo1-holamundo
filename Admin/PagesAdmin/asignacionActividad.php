<?php 

require_once("controladorAdministrador/controladorAdmin.php");

if ($_POST) {
  
    if (isset($_POST["guardar"])) {
        $identificadorUser = $_POST['identificadorColab'];
        $area = $_POST['area'];
        $identificadorAct = $_POST['identificadorNoti'];
        $fecha = $_POST['fecha'];
        manejoAdmin::ingresoAsignacionActividad($identificadorUser, $area, $identificadorAct, $fecha);
   
    }  elseif (isset($_POST["redirigir"])) {
     
        // Redirige después de insertar los datos
        header("Location: /practica1-TS1/Admin/direccionEdicionAsignacionActividades.php");
        exit(); // Asegurarse de que no haya más ejecución de código después de la redirección
    }
}

?>



<div class="row g-5">
    <div class="py-5 text-center">
        <h1>Asignacion de Actividades</h1>
        <hr />
    </div>
    <div class="col-lg-16 row-md-10">
        <h4 class="mb-3">Ingrese los identificadores</h4>
        <form class="needs-validation was-validated " method="post">
            <div class="row g-5">
                <div class="col-sm-6">
                    <label class="form-label" for="identificadorColab">Identificador Usuario</label>
                    <input name="identificadorColab" id="identificadorColab" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                        Identificador requerido
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="nombre">Area</label>
                    <input name="area" id="area" type="text" class="form-control"  required="" >
                    <div class="invalid-feedback">
                        Area requerido
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="identificadorNoti">Identificador Actividad</label>
                    <input name="identificadorNoti" id="identificadorNoti" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                        Actividad requerido
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="nombre">Fecha</label>
                    <input  name="fecha" id="fecha" type="date" class="form-control"  required="" >
                    <div class="invalid-feedback">
                        Fecha requerido
                    </div>
                </div>

                <div class="col-sm-5">
                    <button class="w-100 btn btn-primary btn-md" type="submit" name="guardar">Guardar Informacion Global</button>
                </div>
            </div>
        </form>
   

        <hr class="my-4" />
        <br>
        <br>

        <div class="col-lg-16 row-md-10">
            <h2 class="mb-3">Informacion General Para la Creacion De Noticias</h2>
            <hr>
            <br>
            <div class="row">
              
                <div class="col-md-8">
                    <h4 class="mb-3">Informacion Asigacnion</h4>
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <th>Identificador Usuario</th>
                            <th>Identificador Actividad</th>
                            <th>Fecha</th>
                            <th>Area</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $identificadorUser ?></td>
                                <td><?php echo $identificadorAct ?></td>
                                <td><?php echo $fecha ?></td>
                                <td><?php echo $area ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <br>
        <br>
        <br>

        <form method="post">
        <button type ="submit" class="btn boton btn-info w-100" name="redirigir" >Vista Especifica</button>
        </form>

    </div>
</div>