<?php
header('Content-Type: application/json');
include __DIR__ . "/src/process.php";

try {
    $acaoDoUsuario = $_POST['acao'] ?? 'auditar';
    $idDoAluno = intval($_POST['aluno_id'] ?? 0);

    if ($acaoDoUsuario === 'consultar') {
        echo json_encode([
            'tabela_html' => buscarHistoricoParaTabela($idDoAluno),
            'dados_grafico' => buscarDadosParaOGrafico($idDoAluno)
        ]);
        exit;
    }

    $nvtsAlunoBrutos = $_POST['nvts_aluno'] ?? [];
    $nvtsMentorBrutos = $_POST['nvts_mentor'] ?? [];

    $nvtsAluno = array_values(array_filter($nvtsAlunoBrutos, 'strlen'));
    $nvtsMentor = array_values(array_filter($nvtsMentorBrutos, 'strlen'));

    if (empty($nvtsAluno) || empty($nvtsMentor)) {
        echo json_encode(['erro' => 'Preencha os campos de NVT antes de comparar.']);
        exit;
    }

    foreach (array_merge($nvtsAluno, $nvtsMentor) as $codigo) {
        if (!is_numeric($codigo)) {
            echo json_encode(['erro' => "O valor '$codigo' não é um número válido."]);
            exit;
        }
    }

    $nvtsAluno = array_map('intval', $nvtsAluno);
    $nvtsMentor = array_map('intval', $nvtsMentor);

    $totalBloqueios = contarTotalDeNvtsBloqueados($idDoAluno);
    if ($totalBloqueios >= 2) {
        echo json_encode([
            'status_bloqueio' => true,
            'mensagem' => "⚠️ BLOQUEIO CRÍTICO: O aluno possui $totalBloqueios NVTs bloqueados."
        ]);
        exit;
    }

    $idDoMentor = intval($_POST['mentor_id'] ?? 0);
    $resultado = realizarAuditoriaInteresses($idDoAluno, $idDoMentor, $nvtsAluno, $nvtsMentor);

    echo json_encode([
        'sucesso' => true,
        'nvts_bloqueados' => $resultado['lista_bloqueados'],
        'nvts_sucesso' => $resultado['lista_sucesso'],
        'tabela_atualizada' => buscarHistoricoParaTabela($idDoAluno),
        'dados_grafico' => buscarDadosParaOGrafico($idDoAluno)
    ]);
} catch (Exception $erro) {
    echo json_encode(['erro' => 'Erro: ' . $erro->getMessage()]);
}
