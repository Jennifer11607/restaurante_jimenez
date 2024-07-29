<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);?>





<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php'?>

<div class="container" style="margin-top: 1cm; width: 29cm; border-radius: 1px;  ">
    <h1 class="text-center" style="font-family: fantasy;">INGRESO MESAS</h1>
    <div class="row justify-content-center mb-3">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 form-container" >
                <form>
                    <input type="hidden" name="mesa" id="mesa_id">
                    <div class="form-group text-center">
                        <label for="mesa_numero" class="form-label">¿Cuantas de mesas que necesita?</label>
                        <input type="number" name="mesa_numero" id="mesa_numero" class="form-control " required>
                    </div>
                    <div class="form-group text-center">
                        <label for="mesa_capacidad" class="form-label">Para cuantas personas</label>
                        <input type="number" name="mesa_capacidad" id="mesa_capacidad" class="form-control" required>
                    </div>

                    <div class="form-group text-center">
                    <div class="col text-center">
                    <label for="mesa_ubicacion">Ubicacion de la Mesa</label>
                    <select name="mesa_ubicacion" id="mesa_ubicacion" class="form-select">
                        <option select >Seleccione....</option>
                            <option value="Parte Frontal">Parte Frontal</option>
                            <option value="Primer Nivel">Primer Nivel</option>
                            <option value="Segundo Nivel">Segundo Nivel</option>
                            <option value="Terraza">Terraza</option>
                    </select>
                    </div>
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
            <h2 class="text-center">Listado de Menu</h2>
            <table class="table table-bordered table-hover" id="tablaMesas">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Mesas</th>
                        <th>Personas</th>
                        <th>Ubicacion</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">No hay Mesas</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script defer src="/restaurante_jimenez/src/js/funciones.js"></script>
<script defer src="/restaurante_jimenez/src/js/mesas/index.js"></script>
<?php include_once '../../includes/footer.php' ?>




