<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);?>


<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php'?>

<div class="container" style="margin-top: 1cm; width: 29cm; border-radius: 1px;  ">
    <h1 class="text-center" style="font-family: fantasy;">MENU NOMBRE</h1>
    <div class="row justify-content-center mb-3">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 form-container" >
                <form>
                    <input type="hidden" name="menu_id" id="menu_id">
                    <div class="form-group text-center">
                        <label for="menu_plato" class="form-label">Nombre del Plato</label>
                        <input type="text" name="menu_plato" id="menu_plato" class="form-control " required>
                    </div>
                    <div class="form-group text-center">
                        <label for="menu_descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="menu_descripcion" id="menu_descripcion" class="form-control" required>
                    </div>
                    <div class="form-group text-center">
                        <label for="menu_precio" class="form-label ">Precio</label>
                        <input type="number" name="menu_precio" id="menu_precio" class="form-control mb-2" required>
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
    <div class="row justify-content-center">
        <div class="col-lg-8 table-responsive">
            <h2 class="text-center">Lista de Menu</h2>
            <table class="table table-bordered table-hover" id="tablaMenus">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre del Plato</th>
                        <th>Descripcion</th>
                        <th>Precio Q.</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">No hay Menu</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script defer src="/restaurante_jimenez/src/js/funciones.js"></script>
<script defer src="/restaurante_jimenez/src/js/clientes/index.js"></script>
<?php include_once '../../includes/footer.php' ?>




