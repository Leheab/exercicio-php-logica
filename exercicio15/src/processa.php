<?php
include __DIR__ . "/conexao.php";

function processarSimulacao($inicial, $minima)
{
    global $conexao;

    $inicial = filter_var($inicial, FILTER_VALIDATE_FLOAT);
    $minima = filter_var($minima, FILTER_VALIDATE_FLOAT);

    if ($inicial <= 0 || $minima <= 0 || $minima >= $inicial) {
        return null;
    }

    $concentracao_atual = $inicial;
    $horas = 0;
    $log_html = "";

    while ($concentracao_atual >= $minima) {
        $log_html .= "<div>Hora {$horas}h: <strong>" . number_format($concentracao_atual, 2, ',', '.') . " mg/L</strong></div>";

        $concentracao_atual *= 0.80;

        $horas++;
    }

    $log_html .= "<div class='grey-text italic'>Hora {$horas}h: " . number_format($concentracao_atual, 2, ',', '.') . " mg/L (Limite atingido)</div>";

    $sql = "INSERT INTO exercicio15 (initial_concentration, minimum_concentration, time_result_hours) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ddi", $inicial, $minima, $horas);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    return [
        'tempo' => $horas,
        'log' => $log_html
    ];
}

function buscarHistorico()
{
    global $conexao;

    $sql = "SELECT created_at, initial_concentration, minimum_concentration, time_result_hours FROM exercicio15 ORDER BY created_at DESC";
    $result = mysqli_query($conexao, $sql);

    $html = "";

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data_formatada = date("d/m/Y H:i", strtotime($row['created_at']));
            $conc_ini = number_format($row['initial_concentration'], 2, ',', '.');
            $conc_min = number_format($row['minimum_concentration'], 2, ',', '.');
            $tempo = $row['time_result_hours'];

            $html .= "<tr>
                <td>{$data_formatada}</td>
                <td>{$conc_ini} mg/L</td>
                <td>{$conc_min} mg/L</td>
                <td><strong>{$tempo} h</strong></td>
            </tr>";
        }
    } else {
        $html = "<tr><td colspan='4' class='center grey-text'>Nenhuma simulação registrada no histórico.</td></tr>";
    }

    return $html;
}
