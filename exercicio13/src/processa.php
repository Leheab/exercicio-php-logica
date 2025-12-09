<?php
include "conexao.php";

function salvarPreco($preco)
{
    global $conexao;

    if ($preco == -1) {
        return mostrarResultado();
    }

    $sql = "INSERT INTO exercicio13 (preco, data_cadastro) VALUES ('$preco', NOW())";
    $query = mysqli_query($conexao, $sql);

    if ($query) {
        return "Preço cadastrado: R$ " . number_format($preco, 2, ',', '.');
    } else {
        return "Erro ao salvar.";
    }
}

function mostrarResultado()
{
    global $conexao;

    $sql = "SELECT id, preco, data_cadastro FROM exercicio13";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) == 0) {
        return "Nenhum preço foi cadastrado.";
    }

    $total = 0;
    $faixa = 0;

    $html  = "<h5>Resultado</h5>";
    $html .= "<table class='striped centered'>";
    $html .= "
        <thead>
            <tr>
                <th>ID</th>
                <th>Preço</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
    ";

    while ($row = mysqli_fetch_assoc($result)) {
        $preco = $row["preco"];
        $total++;

        if ($preco >= 50 && $preco <= 150) {
            $faixa++;
        }

        if ($preco >= 50 && $preco <= 150) {
            $faixa++;
        }

        $html .= "
            <tr>
                <td>{$row['id']}</td>
                <td>R$ " . number_format($preco, 2, ',', '.') . "</td>
                <td>{$row['data_cadastro']}</td>
            </tr>
        ";
    }

    $html .= "</tbody></table>";

    $html .= "<p><b>Total de preços:</b> $total</p>";
    $html .= "<p><b>Preços entre 50 e 150:</b> $faixa</p>";

    return $html;
}
