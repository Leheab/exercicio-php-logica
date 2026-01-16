<?php
include __DIR__ . "/conexao.php";


function calcularESalvarTemperaturas($listaTemperaturas)
{
    global $conexao;

    $temperaturaMaisAlta = max($listaTemperaturas);
    $temperaturaMaisBaixa = min($listaTemperaturas);

    $somaTemperaturas = array_sum($listaTemperaturas);
    $quantidadeDias = count($listaTemperaturas);
    $mediaPeriodo = $somaTemperaturas / $quantidadeDias;

    $diasQuentes = 0;
    foreach ($listaTemperaturas as $temp) {
        if ($temp > 30) {
            $diasQuentes++;
        }
    }
    $percentualCalor = ($diasQuentes / $quantidadeDias) * 100;

    $dadosJson = json_encode($listaTemperaturas);

    $sql = "INSERT INTO exercicio17 (temperatura_maxima, temperatura_minima, temperatura_media, percentual_calor, dados_completos_json) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "dddis", $temperaturaMaisAlta, $temperaturaMaisBaixa, $mediaPeriodo, $percentualCalor, $dadosJson);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    return [
        'maxima' => number_format($temperaturaMaisAlta, 1),
        'minima' => number_format($temperaturaMaisBaixa, 1),
        'media' => number_format($mediaPeriodo, 1),
        'percentual' => round($percentualCalor)
    ];
}


function buscarHistoricoTemperaturas()
{
    global $conexao;

    $sql = "SELECT data_registro, temperatura_maxima, temperatura_minima, temperatura_media, percentual_calor 
            FROM exercicio17 ORDER BY data_registro DESC";
    $resultado = mysqli_query($conexao, $sql);

    $html = "";

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $data = date("d/m/Y H:i", strtotime($linha['data_registro']));

            $html .= "<tr>
                <td>{$data}</td>
                <td>{$linha['temperatura_media']}°C</td>
                <td class='red-text'>{$linha['temperatura_maxima']}°C</td>
                <td class='blue-text'>{$linha['temperatura_minima']}°C</td>
                <td>{$linha['percentual_calor']}%</td>
            </tr>";
        }
    } else {
        $html = "<tr><td colspan='5' class='center grey-text'>Nenhum registro encontrado.</td></tr>";
    }

    return $html;
}
