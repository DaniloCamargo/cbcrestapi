<?php

// Configurações de conexão com o banco de dados MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbc_db";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password);

// Verifica se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

// Cria o banco de dados "seu_banco_de_dados" se ainda não existir
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === FALSE) {
    die("Erro ao criar o banco de dados: " . $conn->error);
}

// Selecione o banco de dados
$conn->select_db($dbname);

// Cria a tabela "clubes" com as colunas "id" , "clube" e "saldo_disponivel"
$sql = "CREATE TABLE clubes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
clube VARCHAR(30) NOT NULL,
saldo_disponivel DECIMAL(7,2) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    die("Erro ao criar a tabela: " . $conn->error);
}

// Cria a tabela "recursos" com as colunas "id" , "recurso" e "saldo_disponivel"
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

// Fecha a conexão com o banco de dados
$conn->close();

?>