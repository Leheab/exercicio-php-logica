<?php
include "conexao.php";

function salvarPreco($preco) {
    global $conexao;

    if ($preco == -1) {
        return mostrarResultado();
    }
    
    $sql = "INSERT INTO exercicio13 (preco, data_cadastro) VALUES ('$preco', NOW())";
    $query = mysqli_query($conexao, $sql);

    if ($query) {
        return "Preço cadastrado: R$ $preco";
    } else {
        return "Erro ao salvar.";
    }
}

function mostrarResultado() {
    global $conexao;

    $sql = "SELECT preco FROM exercicio13";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) == 0) {
        return "Nenhum preço foi cadastrado.";
    }

    $total = 0;
    $faixa = 0;

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
