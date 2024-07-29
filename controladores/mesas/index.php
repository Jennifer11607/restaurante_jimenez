<?php
require '../../modelos/Mesa.php';
header('Content-Type: application/json; charset=UTF-8');

$metodo = $_SERVER['REQUEST_METHOD'];
$response = array(
    'mensaje' => 'Error desconocido',
    'codigo' => 0,
    'detalle' => 'Detalles no especificados'
);

try {
    switch ($metodo) {
        case 'POST':
            $tipo = $_REQUEST['tipo'];
            $mesa = new mesa($_POST);
            switch ($tipo) {
                case '1':
                    $ejecucion = $mesa->guardar();
                    $mensaje = "Guardado correctamente";
                    break;
                case '2':
                    $ejecucion = $mesa->modificar();
                    $mensaje = "Modificado correctamente";
                    break;
                case '3':
                    $ejecucion = $mesa->eliminar();
                    $mensaje = "Eliminado correctamente";
                    break;
                default:
                    throw new Exception("Tipo de operación no soportado");
            }
            if ($ejecucion) {
                $response['mensaje'] = $mensaje;
                $response['codigo'] = 1;
            } else {
                $response['mensaje'] = 'Error al ejecutar operación';
                $response['detalle'] = 'No se pudo ejecutar la operación solicitada';
            }
            break;

        case 'GET':
            $mesa = new mesa($_GET);
            $resultado = $mesa->buscar();
            if ($resultado) {
                $response = $resultado;
            } else {
                $response['mensaje'] = 'No se encontraron resultados';
                $response['codigo'] = 1;
            }
            break;

        default:
            throw new Exception("Método no soportado");
    }
} catch (Exception $e) {
    $response['mensaje'] = 'Error de ejecución';
    $response['detalle'] = $e->getMessage();
}

echo json_encode($response);
exit;
