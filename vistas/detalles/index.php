<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require '../../modelos/Reservacion.php';

$busqueda = []; // Inicializar la variable $busqueda

try {
    $fecha = date('d/m/Y');
    $buscar = new Reservacion();
    $busqueda = $buscar->mostrarInformacion();

} catch (PDOException $e) {
    $error = $e->getMessage();
} 
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 table-responsive">
            <table class="table table-bordered" style="font-family:'Courier New', Courier, monospace; background-color: orange;">
                <thead>
                    <tr class="text-center table-primary table-bordered rounded border border-primary">
                        <th colspan="7">DETALLE DE LA RESERVACION</th>
                    </tr>
                </thead>
                <tr>
                    <td colspan="7"><center>RESERVACIONES PARA EL DIA DE HOY (<?= $fecha ?>)</center></td>
                </tr>
                <tr>
                    <th>NO.</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>TELEFONO</th>
                    <th>HORA DE LA RESERVACION</th>
                    <th>NUMERO DE MESA</th>
                </tr>
                <?php if(count($busqueda) > 0) { ?>
                    <?php foreach ($busqueda as $key => $opciones) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $opciones['CLI_NOMBRE'] ?></td>
                            <td><?= $opciones['CLI_APELLIDO'] ?></td>
                            <td><?= $opciones['CLI_TELEFONO'] ?></td>
                            <td><?= $opciones['RESER_HORA'] ?></td>
                            <td><?= $opciones['MESA_NUMERO'] ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="7"><center>SIN RESERVACIONES</center></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php include_once '../../includes/footer.php'?>
