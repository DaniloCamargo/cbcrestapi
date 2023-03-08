<?php
include 'conexao.php';
include 'clube.php';

$clube = new Clube($conn);

$clubes = $clube->listar();

if (count($clubes) > 0) {
    foreach ($clubes as $clube) {
        echo "<tr>";
        echo "<th scope='row'>".$clube['id']."</th>";
        echo "<td>".$clube['clube']."</td>";
        echo "<td>".$clube['saldo_disponivel']."</td>";
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "<td>Nenhum clube cadastrado</td>";
    echo "<td></td>";
    echo "</tr>";
}
?>