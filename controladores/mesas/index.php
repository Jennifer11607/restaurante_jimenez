<?php
require '../../modelos/Mesa.php';
header('Content-Type: application/json; charset=UTF-8');
// Ejemplo de respuesta en PHP
// header('Content-Type: application/json');
// $response = array(
//     'mensaje' => 'Error de conexión',
//     'codigo' => 0,
//     'detalle' => 'Detalles del error'
// );
// echo json_encode($response);
// exit;


$metodo = $_SERVER['REQUEST_METHOD'];


try {
    switch ($metodo) {
        case 'POST':
            $tipo = $_REQUEST['tipo'];
            $paciente = new mesa($_POST);
            switch ($tipo) {
                case '1':
                    $ejecucion = $mesa->guardar();
                    $mensaje = "Guardado correctamente";
                    break;
                    //aqui se creo el caso modificar
                case '2':
                    $ejecucion = $mesa->modificar();
                    $mensaje = "Modificado correctamente";
                    break;
                    //crear caso  eliminar
                case '3':
                    $ejecucion = $mesa->eliminar();
                    $mensaje = "Eliminado correctamente";
                        break;

                default:
                    $mensaje = "Tipo de operación no válida";
                    break;
            }
            http_response_code(200);
            echo json_encode([
                "mensaje" => $mensaje,
                "codigo" => 1,
            ]);
            break;

        case 'GET':
            // http_response_code(200);
            $mesa = new mesa($_GET);
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

