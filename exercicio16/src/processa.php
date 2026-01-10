<?php
include __DIR__ . "/conexao.php";


function saveEvaluation($criterionName, $score)
{
    global $conexao;

    $classification = ($score >= 6) ? "Satisfatória" : "Insatisfatória";

    $sql = "INSERT INTO exercicio16 (criterion_name, score, classification) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sds", $criterionName, $score, $classification);
        $status_execucao = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $status_execucao;
    }
    return false;
}


function listEvaluations()
{
    global $conexao;

    $sql = "SELECT * FROM exercicio16 ORDER BY id DESC";
    $result = mysqli_query($conexao, $sql);

    if (!$result || mysqli_num_rows($result) == 0) {
        return "<tr><td colspan='4' class='center-align'>Nenhuma nota registrada.</td></tr>";
    }

    $html = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $safeName = htmlspecialchars($row['criterion_name'], ENT_QUOTES, 'UTF-8');
        $score = number_format($row['score'], 1, ',', '.');
        $classification = $row['classification'];

        $colorClass = ($classification == "Satisfatória") ? "cor-verde" : "cor-vermelha";
        $icon = ($classification == "Satisfatória") ? "sentiment_satisfied" : "sentiment_dissatisfied";

        $html .= "
            <tr class='animar-linha'>
                <td>{$row['id']}</td>
                <td style='font-size: 0.85rem;'>{$safeName}</td>
                <td class='nota-valor'>{$score}</td>
                <td class='{$colorClass} status-texto'>
                    <i class='material-icons tiny'>{$icon}</i> {$classification}
                </td>
            </tr>";
    }
    return $html;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['criterion'])) {
    $criterion = $_POST['criterion'];
    $score = $_POST['score'];

    $status = saveEvaluation($criterion, $score);

    header('Content-Type: application/json');
    echo json_encode(['success' => $status]);
    exit;
}
