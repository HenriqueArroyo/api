<?php
require_once "connection/Connection.php";

class Estoque {

    public static function getAll() {
        $db = new Connection();
        $query = "SELECT * FROM Estoque";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'ID_estoque' => $row['ID_estoque'],
                    'item' => $row['item'],
                    'quantidade' => $row['quantidade'],
                    'ID_sala' => $row['ID_sala']
                ];
            }
            return $datos;
        }
        return $datos;
    }

    public static function getWhere($id_sala) {
        $db = new Connection();
        $query = "SELECT * FROM Estoque WHERE ID_sala = $id_sala";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'ID_estoque' => $row['ID_estoque'],
                    'item' => $row['item'],
                    'quantidade' => $row['quantidade']
                ];
            }
            return $datos;
        }
        return $datos;
    }

    public static function insert($item, $quantidade, $id_sala) {
        $db = new Connection();
        $query = "INSERT INTO Estoque (item, quantidade, ID_sala) 
                  VALUES ('".$item."', '".$quantidade."', '".$id_sala."')";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }

    public static function update($id_estoque, $item, $quantidade, $id_sala) {
        $db = new Connection();
        $query = "UPDATE Estoque SET
                  item = '".$item."', quantidade = '".$quantidade."', ID_sala = '".$id_sala."'
                  WHERE ID_estoque = $id_estoque";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }

    public static function delete($id_estoque) {
        $db = new Connection();
        $query = "DELETE FROM Estoque WHERE ID_estoque = $id_estoque";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }
}
?>