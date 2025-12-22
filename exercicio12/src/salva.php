<?php
include_once __DIR__ . "/conexao.php";

function gerarPiramide($palavra, $niveis)
{
    global $conexao;

    $palavra = stripslashes($palavra);

    $niveis = (int)$niveis;
    $total = ($niveis * ($niveis + 1)) / 2;

    $palavraParaBanco = substr($palavra, 0, 20);

    $sql = "INSERT INTO Exercicio12 (word, levels, total_repetitions,  date_created)
            VALUES (?, ?, ?, NOW())";

    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sii", $palavraParaBanco, $niveis, $total);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $palavraSafe = htmlspecialchars(
        $palavra,
        ENT_NOQUOTES,
        'UTF-8'
    );

    $palavraSafe = str_replace(
        "'",
        "&amp;#039;",
        $palavraSafe
    );

    $saida = "<h3>{$palavraSafe}</h3>";

    for ($linha = 1; $linha <= $niveis; $linha++) {
        $saida .= str_repeat(
            $palavraSafe,
            $linha
        ) . "<br>";
    }

    $saida .= "<p>
    Níveis: {$niveis} | Total de repetições: {$total}
</p>";

    return $saida;
}
