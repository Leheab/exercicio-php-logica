<?php
include "conexao.php";

function calcularEvolucao($nomePessoa1, $valorInicialPessoa1, $taxaPessoa1, $nomePessoa2, $valorInicialPessoa2, $taxaPessoa2)
{
    global $conexao;

    $nome1Exibicao = htmlspecialchars($nomePessoa1, ENT_QUOTES, 'UTF-8');
    $nome2Exibicao = htmlspecialchars($nomePessoa2, ENT_QUOTES, 'UTF-8');

    if ($valorInicialPessoa1 > $valorInicialPessoa2) {
        return "<p class='blue-text'>$nome1Exibicao já possui mais capital que $nome2Exibicao. Meses: 0.</p>";
    }

    $saldoAtualPessoa1 = (float) $valorInicialPessoa1;
    $saldoAtualPessoa2 = (float) $valorInicialPessoa2;
    $quantidadeMeses = 0;

    if ($taxaPessoa1 <= $taxaPessoa2 && $valorInicialPessoa1 < $valorInicialPessoa2) {
        return "<p class='red-text'>Atenção: Com essas taxas, $nomePessoa1 nunca alcançará $nomePessoa2.</p>";
    }

    while ($saldoAtualPessoa1 <= $saldoAtualPessoa2) {
        $saldoAtualPessoa1 += $saldoAtualPessoa1 * ($taxaPessoa1 / 100);
        $saldoAtualPessoa2 += $saldoAtualPessoa2 * ($taxaPessoa2 / 100);

        $quantidadeMeses++;

        if ($quantidadeMeses > 1200) break;
    }

    $sql = "INSERT INTO exercicio14 
            (nome1, valor1_inicial, taxa1, nome2, valor2_inicial, taxa2, meses, valor1_final, valor2_final) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param(
            $stmt,
            "sddssdidd",
            $nomePessoa1,
            $valorInicialPessoa1,
            $taxaPessoa1,
            $nomePessoa2,
            $valorInicialPessoa2,
            $taxaPessoa2,
            $quantidadeMeses,
            $saldoAtualPessoa1,
            $saldoAtualPessoa2
        );

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $v1_final = number_format($saldoAtualPessoa1, 2, ',', '.');
    $v2_final = number_format($saldoAtualPessoa2, 2, ',', '.');

    return "Foram necessários <b>$quantidadeMeses meses</b> para a ultrapassagem.<br>
            $nome1Exibicao terminou com R$ $v1_final<br>
            $nome2Exibicao terminou com R$ $v2_final";
}

function listarHistorico()
{
    global $conexao;

    $sql = "SELECT * FROM exercicio14 ORDER BY data_calculo DESC";
    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado || mysqli_num_rows($resultado) == 0) {
        return "<tr><td colspan='5'>Nenhum registro encontrado.</td></tr>";
    }

    $htmlTabela = "";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $n1Protegido = htmlspecialchars($linha['nome1'], ENT_QUOTES, 'UTF-8');
        $n2Protegido = htmlspecialchars($linha['nome2'], ENT_QUOTES, 'UTF-8');

        $data = date('d/m/Y H:i', strtotime($linha['data_calculo']));
        $v1_f = number_format($linha['valor1_final'], 2, ',', '.');
        $v2_f = number_format($linha['valor2_final'], 2, ',', '.');

        $htmlTabela .= "<tr>
            <td>$data</td>
            <td>$n1Protegido ({$linha['taxa1']}%)</td>
            <td>$n2Protegido ({$linha['taxa2']}%)</td>
            <td><b>{$linha['meses']}</b></td>
            <td>R$ $v1_f vs R$ $v2_f</td>
        </tr>";
    }
    return $htmlTabela;
}
