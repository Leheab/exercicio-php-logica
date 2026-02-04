<?php
include __DIR__ . "/../db/connection.php";

function salvarVendasNoBancoDeDados($dados_do_formulario)
{
    global $conexao;

    $lista_de_valores = [];

    for ($linha = 0; $linha < 5; $linha++) {

        for ($coluna = 0; $coluna < 5; $coluna++) {

            $nome_do_campo = "valor_" . $linha . "_" . $coluna;

            $valor_venda = isset($dados_do_formulario[$nome_do_campo]) ? (float)$dados_do_formulario[$nome_do_campo] : 0;

            $lista_de_valores[] = $valor_venda;
        }
    }

    $comando_sql = "INSERT INTO exercicio19 (
        state_1_product_1, state_1_product_2, state_1_product_3, state_1_product_4, state_1_product_5,
        state_2_product_1, state_2_product_2, state_2_product_3, state_2_product_4, state_2_product_5,
        state_3_product_1, state_3_product_2, state_3_product_3, state_3_product_4, state_3_product_5,
        state_4_product_1, state_4_product_2, state_4_product_3, state_4_product_4, state_4_product_5,
        state_5_product_1, state_5_product_2, state_5_product_3, state_5_product_4, state_5_product_5
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )";

    $instrucao_preparada = mysqli_prepare($conexao, $comando_sql);

    if ($instrucao_preparada) {
        $tipos_dos_dados = str_repeat("d", 25);

        mysqli_stmt_bind_param($instrucao_preparada, $tipos_dos_dados, ...$lista_de_valores);

        $sucesso_na_execucao = mysqli_stmt_execute($instrucao_preparada);
        mysqli_stmt_close($instrucao_preparada);

        return $sucesso_na_execucao;
    }

    return false;
}
