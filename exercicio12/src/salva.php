<?php
include "conexao.php";

function gerarPiramide() {
    global $conexao;

    $palavra = $_POST['palavra'] ?? '';
    $niveis = $_POST['niveis'] ?? 0;

    $total = ($niveis * ($niveis + 1)) / 2;

    $sql = "INSERT INTO Exercicio12 (word, levels, total_repetitions,  date_created)
            VALUES ('$palavra', $niveis, $total, NOW())";
    mysqli_query($conexao, $sql);

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