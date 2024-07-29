<?php
require '../../modelos/Mesa.php';
header('Content-Type: application/json; charset=UTF-8');

$metodo = $_SERVER['REQUEST_METHOD'];

try {
    switch ($metodo) {
        case 'POST':
            $tipo = $_REQUEST['tipo'];
            $mesa = new Mesa($_POST);  // Corregido a $mesa
            switch ($tipo) {
                case '1':
                    $ejecucion = $mesa->guardar();
                    $mensaje = "Guardado correctamente";
                    $codigo = 1;
                    break;
                case '2':
                    $ejecucion = $mesa->modificar();
                    $mensaje = "Modificado correctamente";
                    $codigo = 2;
                    break;
                case '3':
                    $ejecucion = $mesa->eliminar();
                    $mensaje = "Eliminado correctamente";
                    $codigo = 3;
                    break;
                default:
                    $mensaje = "Tipo de operación no válida";
                    break;
            }
            http_response_code(200);
            echo json_encode([
                "mensaje" => $mensaje,
                "codigo" => $codigo,
            ]);
            break;

        case 'GET':
            $mesa = new Mesa($_GET);
            $mesas = $mesa->buscar();
            echo json_encode($mesas);
            break;

        default:
            http_response_code(405);
            echo json_encode([
                "mensaje" => "Método no permitido",
                "codigo" => 9,
            ]);
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "detalle" => $e->getMessage(),
        "mensaje" => "Error de ejecución",
        "codigo" => 0,
    ]);
}
exit;
