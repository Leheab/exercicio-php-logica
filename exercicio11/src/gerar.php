<?php
include_once "conexao.php";

function calculaMultiplos($base, $quantidade)
{
    global $conexao;

    $base = (int)$base;
    $quantidade = (int)$quantidade;

    $soma = 0;
    $mensagem = "Múltiplos de " . htmlspecialchars($base) . ": <br>";

    for ($posição = 1; $posição <= $quantidade; $posição++) {
        $valor = $base * $posição;
        $soma += $valor;
        $mensagem .= "$base X $posição = $valor<br>";
    }

    $media = $soma / $quantidade;

    $sql = "INSERT INTO exercicio11 (base_number, quantity, average, created_at) VALUES (?, ?, ?, NOW())";

    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iid", $base, $quantidade, $media);

        if (mysqli_stmt_execute($stmt)) {
            $mensagem .= "<br>Dados inseridos com sucesso!<br>";
        } else {
            $mensagem .= "<br>Ocorreu um erro interno ao salvar os dados. Tente novamente.<br>";
        }
        mysqli_stmt_close($stmt);
    } else {
        $mensagem .= "<br>Erro na preparação do banco de dados.<br>";
    }

    $mensagem .= ".<br>";
    $mensagem .= "Quantidade de múltiplos: $quantidade.<br>";
    $mensagem .= "Média:" . number_format($media, 2, ',', '.') . "";

    return $mensagem;
}

function getHistorico()
{
    global $conexao;

    $sql = "SELECT base_number, quantity, average, created_at FROM exercicio11 ORDER BY created_at DESC";
    $res = mysqli_query($conexao, $sql);
    $html = '';

    if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
            $baseSafe = htmlspecialchars($row['base_number']);
            $qtdSafe = htmlspecialchars($row['quantity']);
            $avgSafe = htmlspecialchars($row['average']);
            $dataSafe = htmlspecialchars($row['created_at']);

            $html .= "Base: {$baseSafe} | Quantidade: {$qtdSafe} | Média: {$avgSafe} | Data: {$dataSafe}<br>";
        }
    }
    return $html;
}
