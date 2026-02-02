<?php
include __DIR__ . "/src/conexao.php";
header('Content-Type: application/json');

$id = intval($_POST['id'] ?? 0);
$status = $_POST['status'] ?? '';

if ($id > 0 && $status !== '') {
    $sql = "UPDATE exercicio18 SET status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "si", $status, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['sucesso' => true]);
    } else {
        echo json_encode(['sucesso' => false, 'erro' => 'Falha ao atualizar banco']);
    }
}
