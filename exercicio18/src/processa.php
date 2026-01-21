<?php
date_default_timezone_set('America/Sao_Paulo');

include __DIR__ . "/conexao.php";

mysqli_query($conexao, "SET time_zone = '-03:00'");

function buscarUsuarios(string $papelDesejado)
{
    global $conexao;
    $comandoSql = "SELECT DISTINCT id, nome FROM usuarios WHERE papel = ? ORDER BY nome ASC";
    $stmt = mysqli_prepare($conexao, $comandoSql);
    mysqli_stmt_bind_param($stmt, "s", $papelDesejado);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function contarTotalDeNvtsBloqueados(int $idDoAluno)
{
    global $conexao;
    $comandoSql = "SELECT exclusivos_json FROM exercicio18 WHERE aluno_id = ? AND status = 'Pendente'";
    $stmt = mysqli_prepare($conexao, $comandoSql);
    mysqli_stmt_bind_param($stmt, "i", $idDoAluno);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    $totalGeral = 0;
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $dados = json_decode($linha['exclusivos_json'], true);
        $totalGeral += count($dados['bloqueios'] ?? []);
    }
    return $totalGeral;
}

function realizarAuditoriaInteresses($idAluno, $idMentor, $listaDoAluno, $listaDoMentor)
{
    global $conexao;
    $itensBloqueados = array_unique(array_intersect($listaDoAluno, $listaDoMentor));
    $itensComSucesso = array_unique(array_diff($listaDoAluno, $listaDoMentor));

    $resumoJson = json_encode([
        'bloqueios' => array_values($itensBloqueados),
        'sucessos' => array_values($itensComSucesso)
    ]);

    $dataHoraAgora = date('Y-m-d H:i:s');
    $txtAluno = implode(', ', $listaDoAluno);
    $txtMentor = implode(', ', $listaDoMentor);

    $sqlInsert = "INSERT INTO exercicio18 (aluno_id, mentor_id, nvts_aluno, nvts_mentor, exclusivos_json, status, data_registro) 
                  VALUES (?, ?, ?, ?, ?, 'Pendente', ?)";

    $stmt = mysqli_prepare($conexao, $sqlInsert);
    mysqli_stmt_bind_param($stmt, "iissss", $idAluno, $idMentor, $txtAluno, $txtMentor, $resumoJson, $dataHoraAgora);
    mysqli_stmt_execute($stmt);

    return [
        'lista_bloqueados' => array_values($itensBloqueados),
        'lista_sucesso' => array_values($itensComSucesso)
    ];
}

function buscarHistoricoParaTabela($idAlunoParaFiltrar = null)
{
    global $conexao;
    $sql = "SELECT e.*, u1.nome as nome_aluno, u2.nome as nome_mentor 
            FROM exercicio18 e 
            JOIN usuarios u1 ON e.aluno_id = u1.id 
            JOIN usuarios u2 ON e.mentor_id = u2.id";

    if ($idAlunoParaFiltrar) {
        $sql .= " WHERE e.aluno_id = " . intval($idAlunoParaFiltrar);
    }

    $sql .= " ORDER BY e.data_registro DESC LIMIT 10";
    $resultado = mysqli_query($conexao, $sql);
    $html = "";

    while ($linha = mysqli_fetch_assoc($resultado)) {
        $dataFormatada = date("d/m H:i", strtotime($linha['data_registro']));
        $corStatus = ($linha['status'] == 'Pendente') ? 'status-pendente' : 'status-corrigido';
        $dadosJson = json_decode($linha['exclusivos_json'], true);
        $bloqueiosAtuais = $dadosJson['bloqueios'] ?? [];

        $htmlBotoesBloqueio = "";
        if ($linha['status'] == 'Pendente' && !empty($bloqueiosAtuais)) {
            $htmlBotoesBloqueio = "<div style='margin-top:8px'>";
            foreach ($bloqueiosAtuais as $nvt) {
                $htmlBotoesBloqueio .= "<button class='btn-nvt-individual' onclick='resolverNvtUnico({$linha['id']}, {$nvt})'>
                        NVT {$nvt} <i class='material-icons'>check</i></button>";
            }
            $htmlBotoesBloqueio .= "</div>";
        } elseif ($linha['status'] == 'Corrigido') {
            $htmlBotoesBloqueio = "<div class='green-text' style='margin-top:5px; font-weight:bold; font-size:0.8rem'>Entrega validada</div>";
        }

        $html .= "<tr>
            <td>{$dataFormatada}</td>
            <td style='text-align:left'>
                <b>" . htmlspecialchars($linha['nome_aluno']) . "</b><br>
                <small class='grey-text'>Mentor: " . htmlspecialchars($linha['nome_mentor']) . "</small><br>
                <div style='font-size:0.75rem; color:#1e3a8a'>Entregues: {$linha['nvts_aluno']}</div>
                <div>{$htmlBotoesBloqueio}</div>
            </td>
            <td><span class='status-badge {$corStatus}'>{$linha['status']}</span></td>
            <td>" . ($linha['status'] == 'Corrigido' ? "<i class='material-icons green-text'>check_circle</i>" : "<i class='material-icons amber-text'>hourglass_empty</i>") . "</td>
        </tr>";
    }
    return $html ?: "<tr><td colspan='4' class='center grey-text'>Nenhum registro encontrado.</td></tr>";
}

function buscarDadosParaOGrafico(int $idAluno)
{
    global $conexao;
    $sql = "SELECT 
                SUM(CASE WHEN status = 'Pendente' THEN 1 ELSE 0 END) as pendentes,
                SUM(CASE WHEN status = 'Corrigido' THEN 1 ELSE 0 END) as corrigidos
            FROM exercicio18 WHERE aluno_id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idAluno);
    mysqli_stmt_execute($stmt);
    $dados = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    return ['pendentes' => (int)$dados['pendentes'], 'corrigidos' => (int)$dados['corrigidos']];
}
