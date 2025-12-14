<?php
include "conexao.php";

function gerarPiramide($palavra, $niveis)
{
    global $conexao;

    $niveis = (int)$niveis;
    $total = ($niveis * ($niveis + 1)) / 2;

    $sql = "INSERT INTO Exercicio12 (word, levels, total_repetitions,  date_created)
            VALUES (?, ?, ?, NOW())";

    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sii", $palavra, $niveis, $total);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $palavraSafe = htmlspecialchars($palavra, ENT_QUOTES, 'UTF-8');
    $saida = "<h3>" . $palavraSafe . "</h3>";

    for ($linha = 1; $linha <= $niveis; $linha++) {
        for ($repeticao = 1; $repeticao <= $linha; $repeticao++) {
            $saida .= $palavra . " ";
        }
        $saida .= "<br>";
    }

    $saida .= "<p>Níveis: $niveis | Total de repetições: $total</p>";

    return $saida;
}
