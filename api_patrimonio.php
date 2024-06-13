<?php
require_once "models/Patrimonio.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['ID_sala'])) {
            echo json_encode(Patrimonio::getWhere($_GET['ID_sala']));
        } else {
            echo json_encode(Patrimonio::getAll());
        }
        break;

    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos != NULL) {
            if (Patrimonio::insert($datos->codigo, $datos->item, $datos->status, $datos->ID_sala)) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);
        }
        break;

    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos != NULL) {
            if (Patrimonio::update($datos->codigo, $datos->item, $datos->status, $datos->ID_sala)) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);
        }
        break;

    case 'DELETE':
        if (isset($_GET['codigo'])) {
            if (Patrimonio::delete($_GET['codigo'])) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);
        }
        break;

    default:
        http_response_code(405);
        break;
}
?>