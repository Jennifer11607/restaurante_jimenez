<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../modelos/Mesa.php';
require_once '../../modelos/Cliente.php';

try {
    $mesa = new Mesa();
    $cliente = new Cliente();
    $mesas = $mesa->buscar();
    $clientes = $cliente->buscar();

} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}
    
?>

<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php'?>

<div class="container" style="margin-top: 1cm; width: 29cm; border-radius: 1px;  ">
    <RVA class="text-center" style="font-family: fantasy;">FORMULARIO PARA INGRESAR RESERVACIONES</h1>
    <div class="row justify-content-center mb-3">
    <form class="col-lg-8 border p-3 " style="background-color: rgba(115, 198, 182 ); font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">
    <input type="hidden" name="reser_id" id="reser_id">
    <div class="row mb-3">
                    <div class="col text-center">
                        <label for="reser_mesa">Numero de Mesas</label>
                        <select name="reser_mesa" id="reser_mesa" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($mesas as $key => $mesa) : ?>
                                <option value="<?= $mesa['MESA_ID'] ?>"><?= $mesa['MESA_NUMERO'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col text-center">
                        <label for="reser_cliente">Nombre del Cliente</label>
                        <select name="reser_cliente" id="reser_cliente" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($clientes as $key => $cliente) : ?>
                                <option value="<?= $cliente['CLI_ID'] ?>"><?= $cliente['CLI_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>

            <div class="row mb-3">
                        <div class="col text-center">
                            <label for="reser_fecha">Fecha de la reservacion</label>
                            <input type="date" value="<?= date('m-d-Y') ?>" name="reser_fecha" id="reser_fecha" class="form-control">
                        </div>
                    </div>

                <div class="row mb-3">
                    <div class="col text-center">
                        <label for="reser_hora">Hora de la reservacion</label>
                        <input type="time" value="<?= date('H:i') ?>" name="reser_hora" id="reser_hora" class="form-control">
                    </div>
                </div>        


    <div class="row justify-content-center mb-3">
        <div class="col">
            <button type="submit" id="btnGuardar" class="btn btn-primary w-100 rounded-pill"> <i class="bi bi-floppy"></i>Guardar</button>
        </div>
        <div class="col">
            <button type="button" id="btnBuscar" class="btn btn-info w-100 rounded-pill"><i class="bi bi-search"></i>Buscar</button>
        </div>
        <div class="col">
            <button type="button" id="btnModificar" class="btn btn-warning w-100 rounded-pill"><i class="bi bi-pencil-square"></i>Modificar</button>
        </div>
        <div class="col">
            <button type="button" id="btnCancelar" class="btn btn-secondary w-100 rounded-pill"><i class="bi bi-x-lg"></i> Cancelar</button>
        </div>
        <div class="col">
            <button type="reset" id="btnLimpiar" class="btn btn-secondary w-100 rounded-pill"><i class="bi bi-stars"></i> Limpiar</button>
        </div>
    </div>
</form>

    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8 table-responsive">
            <h2 class="text-center">Listado de Citas</h2>
            <table class="table table-bordered table-hover" id="tablaReservaciones">
                <thead>
                    <tr>
                            <th>NO.</th>
                            <th>No. de Mesas</th>
                            <th>Cliente</th>
                            <th>FECHA </th>
                            <th>HORA</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">No hay reservaciones</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script defer src="/restaurante_jimenez/src/js/funciones.js"></script>
<script defer src="/restaurante_jimenez/src/js/reservaciones/index.js"></script>
<?php include_once '../../includes/footer.php' ?>

