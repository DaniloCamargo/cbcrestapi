<?php
include 'conexao.php';
include 'recursos.php';

$recursos = new Recursos($conn);

if ($resp = $recursos->update($_POST['clube_id'], $_POST['recurso_id'], $_POST['valor_consumo'])) {
    echo $resp;
} else {
    echo "Erro ao fazer update de recursos.";
}
?>
