<?php
include 'conexao.php';
include 'clube.php';

$clube = new Clube($conn);

if ($clube->cadastrar($_POST['clube'], $_POST['saldo_disponivel'])) {
    header('Location: index.php');
} else {
    echo "Erro ao cadastrar o clube.";
}
?>