<?php

header('Content-Type: application/json');

try {
    include __DIR__ . "/src/processa.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['temperaturas'])) {

        $temperaturasLimpas = array_map('floatval', $_POST['temperaturas']);

        $resultado = calcularESalvarTemperaturas($temperaturasLimpas);

        echo json_encode($resultado);
    } else {
        echo json_encode(['erro' => 'Nenhum dado recebido']);
    }
} catch (Exception $e) {
    echo json_encode(['erro' => $e->getMessage()]);
}
