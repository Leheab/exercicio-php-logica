<?php
include __DIR__ . "/src/conexao.php";
header('Content-Type: application/json');

$idRegistro = intval($_POST['id'] ?? 0);
$nvtParaRemover = intval($_POST['nvt'] ?? 0);

if ($idRegistro > 0 && $nvtParaRemover > 0) {
    $sql = "SELECT exclusivos_json FROM exercicio18 WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idRegistro);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    $dados = json_decode($resultado['exclusivos_json'], true);

    if (($key = array_search($nvtParaRemover, $dados['bloqueios'])) !== false) {
        unset($dados['bloqueios'][$key]);
    }

    $novoStatus = (empty($dados['bloqueios'])) ? 'Corrigido' : 'Pendente';
    $novoJson = json_encode(['bloqueios' => array_values($dados['bloqueios']), 'sucessos' => $dados['sucessos']]);

    $sqlUpdate = "UPDATE exercicio18 SET exclusivos_json = ?, status = ? WHERE id = ?";
    $stmtUpdate = mysqli_prepare($conexao, $sqlUpdate);
    mysqli_stmt_bind_param($stmtUpdate, "ssi", $novoJson, $novoStatus, $idRegistro);

    if (mysqli_stmt_execute($stmtUpdate)) {
        echo json_encode(['sucesso' => true]);
    } else {
        echo json_encode(['sucesso' => false]);
    }
}
