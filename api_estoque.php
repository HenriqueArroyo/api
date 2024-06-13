<?php
require_once "models/Estoque.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['ID_estoque'])) {
            echo json_encode(Estoque::getWhere($_GET['ID_estoque']));
        } else {
            echo json_encode(Estoque::getAll());
        }
        break;

    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos != NULL) {
            if (Estoque::insert($datos->item, $datos->quantidade, $datos->ID_sala)) {
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
            if (Estoque::update($datos->ID_estoque, $datos->item, $datos->quantidade, $datos->ID_sala)) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);
        }
        break;

    case 'DELETE':
        if (isset($_GET['ID_estoque'])) {
            if (Estoque::delete($_GET['ID_estoque'])) {
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