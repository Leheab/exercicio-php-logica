<?php
include __DIR__ . "/../db/connection.php";

function salvarNoBanco($dados_recebidos)
{
    global $conexao;

    $matriz = $dados_recebidos['ponto'];
    $lista_simples = [];

    for ($linha = 0; $linha < 5; $linha++) {
        for ($coluna = 0; $coluna < 5; $coluna++) {
            $valor = isset($matriz[$linha][$coluna]) ? (int)$matriz[$linha][$coluna] : 0;
            $lista_simples[] = $valor;
        }
    }

    $sql = "INSERT INTO exercicio20 (
        jogador_1_partida_1, jogador_1_partida_2, jogador_1_partida_3, jogador_1_partida_4, jogador_1_partida_5,
        jogador_2_partida_1, jogador_2_partida_2, jogador_2_partida_3, jogador_2_partida_4, jogador_2_partida_5,
        jogador_3_partida_1, jogador_3_partida_2, jogador_3_partida_3, jogador_3_partida_4, jogador_3_partida_5,
        jogador_4_partida_1, jogador_4_partida_2, jogador_4_partida_3, jogador_4_partida_4, jogador_4_partida_5,
        jogador_5_partida_1, jogador_5_partida_2, jogador_5_partida_3, jogador_5_partida_4, jogador_5_partida_5
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )";

    $preparar = mysqli_prepare($conexao, $sql);

    if ($preparar) {
        $tipos = str_repeat("i", 25); // 25 números inteiros
        mysqli_stmt_bind_param($preparar, $tipos, ...$lista_simples);
        $executou = mysqli_stmt_execute($preparar);
        mysqli_stmt_close($preparar);
        return $executou;
    }
    return false;
}

// Função para gerar o desenho da tabela na tela
function gerarTabela($matriz, $titulo, $filtro)
{
    $nomes = ["Turma Recicla", "Turma Planeta", "Turma Vida", "Turma Futuro", "Turma Verde"];

    $html = "<div class='cartao-resultado glass'>";
    $html .= "<h5>$titulo</h5>";
    $html .= "<table class='centered striped'>";
    $html .= "<thead><tr><th>Equipe</th><th>P1</th><th>P2</th><th>P3</th><th>P4</th><th>P5</th></tr></thead>";
    $html .= "<tbody>";

    for ($l = 0; $l < 5; $l++) {
        $html .= "<tr>";
        $html .= "<td><strong>{$nomes[$l]}</strong></td>";
        for ($c = 0; $c < 5; $c++) {
            $num = (int)$matriz[$l][$c];
            $mostrar = "";

            if ($filtro == "todos") {
                $mostrar = $num;
            } elseif ($filtro == "impares") {
                $mostrar = ($num % 2 != 0) ? $num : "0";
            } elseif ($filtro == "pares") {
                $mostrar = ($num % 2 == 0) ? $num : "0";
            }

            $html .= "<td>$mostrar</td>";
        }
        $html .= "</tr>";
    }
    $html .= "</tbody></table></div>";
    return $html;
}
