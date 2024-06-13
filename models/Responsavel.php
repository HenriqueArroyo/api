<?php
require_once "connection/Connection.php";

class Responsavel {

    public static function getAll() {
        $db = new Connection();
        $query = "SELECT * FROM Responsavel";
        $resultado = $db->query($query);
        $dados = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $dados[] = [
                    'ID_responsavel' => $row['ID_responsavel'],
                    'NOME' => $row['NOME'],
                    'EMAIL' => $row['EMAIL'],
                    'SENHA' => $row['SENHA'],
                    'ID_setor' => $row['ID_setor']
                ];
            }
            return $dados;
        }
        return $dados;
    }

    public static function getWhere($id_responsavel) {
        $db = new Connection();
        $query = "SELECT * FROM Responsavel WHERE ID_responsavel = $id_responsavel";
        $resultado = $db->query($query);
        $dados = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $dados[] = [
                    'ID_responsavel' => $row['ID_responsavel'],
                    'NOME' => $row['NOME'],
                    'EMAIL' => $row['EMAIL'],
                    'SENHA' => $row['SENHA'],
                    'ID_setor' => $row['ID_setor']
                ];
            }
            return $dados;
        }
        return $dados;
    }

    public static function insert($nome, $email, $senha, $id_setor) {
        $db = new Connection();
        $query = "INSERT INTO Responsavel (NOME, EMAIL, SENHA, ID_setor) 
                  VALUES ('".$nome."', '".$email."', '".$senha."', '".$id_setor."')";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }

    public static function update($id_responsavel, $nome, $email, $senha, $id_setor) {
        $db = new Connection();
        $query = "UPDATE Responsavel SET
                  NOME = '".$nome."', EMAIL = '".$email."', SENHA = '".$senha."', 
                  ID_setor = '".$id_setor."'
                  WHERE ID_responsavel = $id_responsavel";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }

    public static function delete($id_responsavel) {
        $db = new Connection();
        $query = "DELETE FROM Responsavel WHERE ID_responsavel = $id_responsavel";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }
}
?>
