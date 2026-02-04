<?php
header('Content-Type: application/json');

require_once __DIR__ . "/src/sales_processor.php";

$resposta_final = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $verificacao_salvamento = salvarVendasNoBancoDeDados($_POST);

    if ($verificacao_salvamento) {
        $resposta_final['status'] = 'sucesso';
        $resposta_final['mensagem'] = 'Vendas registradas com sucesso!';
    } else {
        $resposta_final['status'] = 'erro';
        $resposta_final['mensagem'] = 'Ocorreu um erro ao salvar no banco de dados.';
    }
} else {
    $resposta_final['status'] = 'erro';
    $resposta_final['mensagem'] = 'Método de envio inválido.';
}

echo json_encode($resposta_final);
