<?php
include "conexao.php";

function calculaMultiplos($base, $quantidade) {
    global $conexao;

    $base = (int)$base;
    $quantidade = (int)$quantidade;

    $soma = 0;
    $mensagem = "Múltiplos de $base: <br>";

    for ($posição = 1; $posição <= $quantidade; $posição++) {
        $valor = $base * $posição;
        $soma += $valor;
        $mensagem .= "$base X $posição = $valor<br>";
    }

    $media = $soma / $quantidade;

    $sql = "INSERT INTO exercicio11 (base_number, quantity, average, created_at)
        VALUES ('$base', '$quantidade', '$media', NOW())";

        if (mysqli_query($conexao, $sql)) {
       $mensagem .= "<br>Dados inseridos com sucesso!<br>";
    } else {
        $mensagem .= "<br>Erro ao inserir dados: " . mysqli_error($conexao) . "<br>";
    }
    
    $media = $soma / $quantidade;

    $mensagem .= ".<br>";
    $mensagem .= "Quantidade de múltiplos: $quantidade.<br>";
    $mensagem .= "Média: $media";

    return $mensagem;
}

function getHistorico() {
    global $conexao;
    $res = mysqli_query($conexao, "SELECT base_number, quantity, average, created_at FROM exercicio11 ORDER BY created_at DESC");
    $html = '';
    while ($row = mysqli_fetch_assoc($res)) {
        $html .= "Base: {$row['base_number']} | Quantidade: {$row['quantity']} | Média: {$row['average']} | Data: {$row['created_at']}<br>";
    }
    return $html;
}
?>