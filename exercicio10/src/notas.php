<?php
include "conexao.php";

function calculaNota($nome, $disciplina, $nota): string {
    if ($nota < 5) {
        $situação = "Reprovado";
        $cor = "#f44336";
    } elseif ($nota <= 6.9) {
        $situação = "Recuperação";
        $cor = "#ffc107";
    } else {
        $situação = "Aprovado";
        $cor = "#64dd17";
    }

    global $conexao;

    $sql = "INSERT INTO exercicio10 (name, subject, score, status) 
            VALUES ('$nome', '$disciplina', '$nota', '$situação')";
    
    if (mysqli_query($conexao, $sql)) {
        echo " Cadastrado com sucesso";
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }

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
    $resultado .= "      <td>$nome</td>";
    $resultado .= "      <td>$disciplina</td>";
    $resultado .= "      <td>$nota</td>";
    $resultado .= "      <td style='background-color: $cor; color: #212121;'>$situação</td>";
    $resultado .= "      <td>$data</td>";
    $resultado .= "    </tr>";
    $resultado .= "  </tbody>";
    $resultado .= "</table>";

    return $resultado;
}
?>