<?php
require_once "models/Funcionario.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['ID_funcionario'])) {
            echo json_encode(Funcionario::getWhere($_GET['ID_funcionario']));
        } else {
            echo json_encode(Funcionario::getAll());
        }
        break;
    
    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos != NULL) {
            if (Funcionario::insert($datos->NOME, $datos->EMAIL, $datos->SENHA, $datos->ID_responsavel, $datos->ID_sala)) {
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
            if (Funcionario::update($datos->ID_funcionario, $datos->NOME, $datos->EMAIL, $datos->SENHA, $datos->ID_responsavel, $datos->ID_sala)) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);
        }
        break;
    
    case 'DELETE':
        if (isset($_GET['ID_funcionario'])) {
            if (Funcionario::delete($_GET['ID_funcionario'])) {
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