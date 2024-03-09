<?php
require_once  "../controller/controller.php";

header("content-type:  application/json");

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {
        // consulta SELECT   -----------------------------------------------
    case  'GET':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos !== null) {
            $result = controller::consultar_usuario($datos->Nombre);
            echo  json_encode($result);
        }

        break;
        //INSERT -----------------------------------------------
    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos != null) {
            $result =  controller::inserta_usuario($datos->Nombre);
            echo json_encode($result);
        } else {
            http_response_code(400);
        }

        break;
        // UPDATE -----------------------------------------------
    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos !== null) {
            $result = controller::actualiza_usuario($datos->Id, $datos->Nombre_nuevo);
            echo json_encode($result);
        }
        break;
        // DELETE -----------------------------------------------
    case 'DELETE':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos !== null) {
            $result  = controller::eliminar_usuario($datos->Id);
            echo json_encode($result);
        }

        break;

    default:
        echo 'metodo no permitido';
}
