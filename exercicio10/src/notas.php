<?php
include "conexao.php";

function calculaNota($nome, $disciplina, $nota): string
{

    $notaFloat = floatval($nota);

    if ($notaFloat < 5) {
        $situacao = "Reprovado";
        $cor = "#f44336";
    } elseif ($notaFloat <= 6.9) {
        $situacao = "Recuperação";
        $cor = "#ffc107";
    } else {
        $situacao = "Aprovado";
        $cor = "#64dd17";
    }

    global $conexao;

    $sql = "INSERT INTO exercicio10 (name, subject, score, status) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssds", $nome, $disciplina, $notaFloat, $situacao);

        if (mysqli_stmt_execute($stmt)) {
            $mensagem = " Cadastrado com sucesso";
        } else {
            $mensagem =  "Erro: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $mensagem = "Erro na preparação do SQL: " . mysqli_error($conexao);
    }

    echo $mensagem;

    $nomeSafe = htmlspecialchars($nome);
    $disciplinaSafe = htmlspecialchars($disciplina);
    $notaSafe = htmlspecialchars($nota);

    $situacaoSafe = htmlspecialchars($situacao);

    $data = date("d/m/Y H:i:s");

    $resultado  = "<h2>Resultado do Aluno</h2>";
    $resultado .= "<table class='highlight' style='margin-top: 20px; color: #212121;'>";

    $resultado .= "  <thead>
                        <tr>
                          <th>Nome</th>
                          <th>Disciplina</th>
                          <th>Nota</th>
                          <th>Situação</th>
                          <th>Data e Hora</th>
                        </tr>
                     </thead>";

    $resultado .= "  <tbody>";
    $resultado .= "    <tr>";
    $resultado .= "      <td>$nomeSafe</td>";
    $resultado .= "      <td>$disciplinaSafe</td>";
    $resultado .= "      <td>$notaSafe</td>";

    $resultado .= "      <td style='background-color: $cor; color: #212121;'>$situacaoSafe</td>";

    $resultado .= "      <td>$data</td>";
    $resultado .= "    </tr>";
    $resultado .= "  </tbody>";
    $resultado .= "</table>";

    return $resultado;
}
