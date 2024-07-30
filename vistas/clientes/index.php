<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);?>


<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php'?>

<div class="container" style="margin-top: 1cm; width: 29cm; border-radius: 1px;  ">
    <h1 class="text-center" style="font-family: Nunito, sans-serif; color:aliceblue;">CLIENTES</h1>
    <div class="row justify-content-center mb-3">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 form-container" >
                <form>
                    <input type="hidden" name="cli_id" id="cli_id">
                    <div class="form-group text-center">
                        <label for="cli_nombre" class="form-label">Nombre</label>
                        <input type="text" name="cli_nombre" id="cli_nombre" class="form-control " required>
                    </div>
                    <div class="form-group text-center">
                        <label for="cli_apellido" class="form-label">Apellido</label>
                        <input type="text" name="cli_apellido" id="cli_apellido" class="form-control" required>
                    </div>
                    <div class="form-group text-center">
                        <label for="cli_telefono" class="form-label ">No. de Teléfono</label>
                        <input type="text" name="cli_telefono" id="cli_telefono" class="form-control mb-2" required>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" id="btnGuardar" class="btn btn-primary btn-block btn-custom "><i class="bi bi-floppy"></i> Guardar</button>
                        </div>
                        <div class="col text-center">
                            <button type="button" id="btnBuscar" class="btn btn-success btn-block btn-custom "><i class="bi bi-search"></i>Buscar</button>
                        </div>
                        <div class="col text-center">
                            <button type="button" id="btnModificar" class="btn btn-warning btn-block btn-custom "><i class="bi bi-pencil-square"> </i>Modificar</button>
                        </div>
                        <div class="col text-center">
                            <button type="button" id="btnCancelar" class="btn btn-secondary btn-block btn-custom "><i class="bi bi-x-lg"></i> Cancelar</button>
                        </div>
                        <div class="col text-center">
                            <button type="reset" id="btnLimpiar" class="btn btn-secondary btn-block btn-custom "><i class="bi bi-stars"></i> Limpiar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    <div class="row justify-content-center" >
        <div class="col-lg-8 table-responsive" style="background: #f39c12;">
            <h2 class="text-center">Lista de Clientes</h2>
            <table class="table table-bordered table-hover" id="tablaClientes">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">No hay clientes</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script defer src="/restaurante_jimenez/src/js/funciones.js"></script>
<script defer src="/restaurante_jimenez/src/js/clientes/index.js"></script>
<?php include_once '../../includes/footer.php' ?>




