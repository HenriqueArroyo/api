<?php
require_once 'models/Responsavel.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        if (isset($_GET['ID_responsavel'])) {
            $id_responsavel = intval($_GET['ID_responsavel']);
            $result = Responsavel::getWhere($id_responsavel);
        } else {
            $result = Responsavel::getAll();
        }
        echo json_encode($result);
        break;

    case 'POST':
        if (isset($input['NOME'], $input['EMAIL'], $input['SENHA'], $input['ID_setor'])) {
            $nome = $input['NOME'];
            $email = $input['EMAIL'];
            $senha = password_hash($input['SENHA'], PASSWORD_DEFAULT); // Hash the password
            $id_setor = $input['ID_setor'];
            $success = Responsavel::insert($nome, $email, $senha, $id_setor);
            echo json_encode(['success' => $success]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid input']);
        }
        break;

    case 'PUT':
        if (isset($_GET['ID_responsavel']) && isset($input['NOME'], $input['EMAIL'], $input['SENHA'], $input['ID_setor'])) {
            $id_responsavel = intval($_GET['ID_responsavel']);
            $nome = $input['NOME'];
            $email = $input['EMAIL'];
            $senha = password_hash($input['SENHA'], PASSWORD_DEFAULT); // Hash the password
            $id_setor = $input['ID_setor'];
            $success = Responsavel::update($id_responsavel, $nome, $email, $senha, $id_setor);
            echo json_encode(['success' => $success]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid input']);
        }
        break;

    case 'DELETE':
        if (isset($_GET['ID_responsavel'])) {
            $id_responsavel = intval($_GET['ID_responsavel']);
            $success = Responsavel::delete($id_responsavel);
            echo json_encode(['success' => $success]);
        } else {
            echo json_encode(['success' => false, 'message' => 'ID not specified']);
        }
        break;

    default:
        echo json_encode(['success' => false, 'message' => 'Method not supported']);
        break;
}
?>