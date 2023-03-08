<?php
class Recursos {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function update($clube_id, $recurso_id, $valor_consumo) {
        $resp = $this->verificarConsumo($clube_id, $recurso_id, $valor_consumo);
        if ($resp) {
            $novo_valor_recurso = $resp['recursos']['saldo_disponivel'] - $valor_consumo;
            $sql = "UPDATE recursos SET saldo_disponivel = '$novo_valor_recurso' WHERE id = '$recurso_id'";
            if (mysqli_query($this->conn, $sql)) {
                $novo_valor_clube = $resp['clubes']['saldo_disponivel'] - $valor_consumo;
                $sql = "UPDATE clubes SET saldo_disponivel = '$novo_valor_clube' WHERE id = '$clube_id'";
                if (mysqli_query($this->conn, $sql)) {
                    $resp_array = array(
                        "clube" => $resp['clubes']['clube'],
                        "saldo_anterior" => $resp['clubes']['saldo_disponivel'],
                        "saldo_atual" => $novo_valor_clube
                    );
                    return json_encode($resp_array);
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return 'O saldo disponível do clube é insuficiente.';
        }
    }

    function verificarConsumo($clube_id, $recurso_id, $valor_consumo) {
        $sql_1 = "SELECT * FROM clubes WHERE `id`='{$clube_id}' LIMIT 1";
        $result_1 = mysqli_query($this->conn, $sql_1);

        $clubes = array();
        while ($row = mysqli_fetch_assoc($result_1)) {
            $clubes[] = $row;
        }

        $sql_2 = "SELECT * FROM recursos WHERE `id`='{$recurso_id}' LIMIT 1";
        $result_2 = mysqli_query($this->conn, $sql_2);

        $recursos = array();
        while ($row = mysqli_fetch_assoc($result_2)) {
            $recursos[] = $row;
        }

        if ($valor_consumo <= $clubes[0]['saldo_disponivel'] && $valor_consumo <= $recursos[0]['saldo_disponivel']) {
            return array(
                "clubes" => $clubes[0],
                "recursos" => $recursos[0]
            );
        } else {
            return false;
        }
    }
}
?>