<?php

// Configurações de conexão com o banco de dados MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbc_db";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === FALSE) {
    die("Erro ao criar o banco de dados: " . $conn->error);
}

$conn->select_db($dbname);

$sql = "CREATE TABLE clubes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
clube VARCHAR(30) NOT NULL,
saldo_disponivel DECIMAL(7,2) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    die("Erro ao criar a tabela: " . $conn->error);
}

$sql = "CREATE TABLE recursos (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
recurso VARCHAR(30) NOT NULL,
saldo_disponivel DECIMAL(7,2) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    die("Erro ao criar a tabela: " . $conn->error);
}

$sql = "INSERT INTO recursos (recurso, saldo_disponivel) VALUES ('Recurso para passagens', '10000.00')";
mysqli_query($conn, $sql);

$sql = "INSERT INTO recursos (recurso, saldo_disponivel) VALUES ('Recurso para hospedagens', '10000.00')";
mysqli_query($conn, $sql);

echo "Banco de dados e tabela criados com sucesso!";

$conn->close();

?>