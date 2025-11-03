<?php
function gerarPiramide() {
    $palavra = $_POST['palavra'] ?? '';
    $niveis = $_POST['niveis'] ?? 0;

    $total = ($niveis * ($niveis + 1)) / 2;

    echo "<h3>$palavra</h3>";

    for ($linha = 1; $linha <= $niveis; $linha++) {
        for ($repeticao = 1; $repeticao <= $linha; $repeticao++) {
            echo $palavra . " ";
        }
        echo "<br>";
    }

    echo "<p>Níveis: $niveis | Total de repetições: $total</p>";
}
?>