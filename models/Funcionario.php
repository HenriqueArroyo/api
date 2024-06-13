<?php
require_once "connection/Connection.php";

class Funcionario {

    public static function getAll() {
        $db = new Connection();
        $query = "SELECT * FROM Funcionario";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'ID_funcionario' => $row['ID_funcionario'],
                    'NOME' => $row['NOME'],
                    'EMAIL' => $row['EMAIL'],
                    'SENHA' => $row['SENHA'],
                    'ID_responsavel' => $row['ID_responsavel'],
                    'ID_sala' => $row['ID_sala']
                ];
            }
            return $datos;
        }
        return $datos;
    }

    public static function getWhere($id_funcionario) {
        $db = new Connection();
        $query = "SELECT * FROM Funcionario WHERE ID_funcionario = $id_funcionario";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'ID_funcionario' => $row['ID_funcionario'],
                    'NOME' => $row['NOME'],
                    'EMAIL' => $row['EMAIL'],
                    'SENHA' => $row['SENHA'],
                    'ID_responsavel' => $row['ID_responsavel'],
                    'ID_sala' => $row['ID_sala']
                ];
            }
            return $datos;
        }
        return $datos;
    }

    public static function insert($nome, $email, $senha, $id_responsavel, $id_sala) {
        $db = new Connection();
        $query = "INSERT INTO Funcionario (NOME, EMAIL, SENHA, ID_responsavel, ID_sala) 
                  VALUES ('".$nome."', '".$email."', '".$senha."', '".$id_responsavel."', '".$id_sala."')";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }

    public static function update($id_funcionario, $nome, $email, $senha, $id_responsavel, $id_sala) {
        $db = new Connection();
        $query = "UPDATE Funcionario SET
                  NOME = '".$nome."', EMAIL = '".$email."', SENHA = '".$senha."', 
                  ID_responsavel = '".$id_responsavel."', ID_sala = '".$id_sala."'
                  WHERE ID_funcionario = $id_funcionario";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }

    public static function delete($id_funcionario) {
        $db = new Connection();
        $query = "DELETE FROM Funcionario WHERE ID_funcionario = $id_funcionario";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }
}
?>