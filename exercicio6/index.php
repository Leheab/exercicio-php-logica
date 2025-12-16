<?php
include "src/countStar.php";
$print = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = intval($_POST["numero"]);

    $numeroSeguro = htmlspecialchars($numero);

    if ($numero < 1 || $numero > 7) {
        $print = "Número inválido ($numeroSeguro). Digite um valor de 1 a 7.";
    } else {
        $print = countStar($numero);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>Verificador de Dias da Semana:</title>
</head>

<body>

    <h1> Verificar Dia da Semana:</h1>

    <form action="" method="post">
        <div>
            <label for="numero">Digite um número de 1 a 7 para verificar o dia correspondente:</label>
            <input type="number" name="numero" required>
        </div>

        <div>
            <input type="submit" value="Encontrar">
        </div>
    </form>

    <div class="resultado">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p>Entrada processada: <strong>" . $numeroSeguro . "</strong></p>";
            echo "<hr>";
        }
        ?>

        <?= isset($print) ? $print : '' ?>
    </div>

</body>

</html>