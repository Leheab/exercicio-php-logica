<?php
include "conexao.php";

function salvarPreco($preco)
{
    global $conexao;

    $preco = trim($preco);
    if ($preco == -1) {
        return mostrarResultado();
    }
    
    $sql = "INSERT INTO exercicio13 (preco, data_cadastro) VALUES ('$preco', NOW())";
    $query = mysqli_query($conexao, $sql);

    $preco = str_replace(',', '.', $preco);

    if (!filter_var($preco, FILTER_VALIDATE_FLOAT)) {
        return "<span style='color:red'>Erro: Insira apenas números válidos.</span>";
    }

    $sql = "INSERT INTO exercicio13 (preco, data_cadastro) VALUES (?, NOW())";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "d", $preco);

        $executou = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($executou) {
            return "Preço cadastrado: R$ " . number_format((float)$preco, 2, ',', '.');
        } else {
            return "<span style='color:red'>Erro interno ao salvar os dados.</span>";
        }
    } else {
        return "<span style='color:red'>Erro na conexão com o banco.</span>";
    }
}

function mostrarResultado()
{
    global $conexao;

    $sql = "SELECT id, preco, data_cadastro FROM exercicio13 ORDER BY data_cadastro DESC";
    $result = mysqli_query($conexao, $sql);

    if (!$result || mysqli_num_rows($result) == 0) {
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

    while ($linha = mysqli_fetch_assoc($result)) {
        $valor = $linha["preco"];
        $total++;

        if ($valor >= 50 && $valor <= 150) {
            $faixa++;
        }
    }

    $texto = "";
    $texto .= "Total de preços informados: $total<br>";
    $texto .= "Preços dentro da faixa (50 a 150): $faixa";

    return $texto;
}
