<?php
function calculaMultiplos($base, $quantidade) {
    $base = (int)$base;
    $quantidade = (int)$quantidade;

    $valores = [];
    $soma = 0;
    $mensagem = "Múltiplos de $base: <br>";

    for ($posição = 1; $posição <= $quantidade; $posição++) {
        $valor = $base * $posição;
        $valores[] = $valor;
        $soma += $valor;

        if ($posição > 1) $mensagem .= " ";
        $mensagem .= "$base X $posição = $valor<br>";
    }

    $media = $soma / $quantidade;

    $mensagem .= ".<br>";
    $mensagem .= "Quantidade de múltiplos: $quantidade.<br>";
    $mensagem .= "Média: $media";

    return $mensagem;
}