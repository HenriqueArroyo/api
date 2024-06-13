<?php
require_once "connection/Connection.php";

class Patrimonio {

    public static function getAll() {
        $db = new Connection();
        $query = "SELECT * FROM Patrimonio";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'codigo' => $row['codigo'],
                    'item' => $row['item'],
                    'status' => $row['status'],
                    'ID_sala' => $row['ID_sala']
                ];
            }
            return $datos;
        }
        return $datos;
    }

    public static function getWhere($codigo) {
        $db = new Connection();
        $query = "SELECT * FROM Patrimonio WHERE codigo = '$codigo'";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'codigo' => $row['codigo'],
                    'item' => $row['item'],
                    'status' => $row['status'],
                    'ID_sala' => $row['ID_sala']
                ];
            }
            return $datos;
        }
        return $datos;
    }

    public static function insert($codigo, $item, $status, $id_sala) {
        $db = new Connection();
        $query = "INSERT INTO Patrimonio (codigo, item, status, ID_sala) 
                  VALUES ('".$codigo."', '".$item."', '".$status."', '".$id_sala."')";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }

    public static function update($codigo, $item, $status, $id_sala) {
        $db = new Connection();
        $query = "UPDATE Patrimonio SET
                  item = '".$item."', status = '".$status."', ID_sala = '".$id_sala."'
                  WHERE codigo = '$codigo'";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }

    public static function delete($codigo) {
        $db = new Connection();
        $query = "DELETE FROM Patrimonio WHERE codigo = '$codigo'";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }
}
?>