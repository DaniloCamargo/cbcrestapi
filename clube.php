<?php
class Clube {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function cadastrar($clube, $saldo_disponivel) {
        $sql = "INSERT INTO clubes (clube, saldo_disponivel) VALUES ('$clube', '$saldo_disponivel')";
        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function listar() {
        $sql = "SELECT * FROM clubes";
        $result = mysqli_query($this->conn, $sql);
        $clubes = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $clubes[] = $row;
        }
        return $clubes;
    }
}
?>