<?php
class RestAPI {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function insertData($table, $data) {
        $keys = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));
        $sql = "INSERT INTO $table ($keys) VALUES ('$values')";

        $this->conn->query($sql);
        return $this->conn->execute();
    }

    function getList($table) {
        $sql = "SELECT * FROM $table";

        $this->conn->query($sql);
        return $this->conn->resultset();
    }

    function getData($table, $id) {
        $sql = "SELECT * FROM $table WHERE id = :id";

        $this->conn->query($sql);
        $this->conn->bind(':id', $id);
        return $this->conn->single();
    }

    function updateData($table, $id, $data) {
        $fields = "";
        foreach ($data as $key => $value) {
            $fields .= "$key = '$value',";
        }
        $fields = rtrim($fields, ",");

        $sql = "UPDATE $table SET $fields WHERE id = :id";

        $this->conn->query($sql);
        $this->conn->bind(':id', $id);
        return $this->conn->execute();
    }
}
?>