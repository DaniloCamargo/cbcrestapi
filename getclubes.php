<?php
include 'conexao.php';
include 'clube.php';

$clube = new Clube($conn);

$clubes = $clube->listar();

if (count($clubes) > 0) {
    foreach ($clubes as $clube) {
        echo "<option value='".$clube['id']."'>".$clube['clube']."</option>";
    }
} else {
    echo "<option value='0'>Nenhum clube cadastrado</option>";
}
?>