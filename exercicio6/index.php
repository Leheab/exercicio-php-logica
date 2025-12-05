<?php
session_start();
include "src/countStar.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["captcha"] != $_SESSION["captcha"]) {
        $print = "Captcha incorreto. Tente novamente.";
        $_SESSION["captcha"] = rand(1000, 9999);
    } else {

        $numero = intval($_POST["numero"]);

        if ($numero < 1 || $numero > 7) {
            $print = "Número inválido. Digite um valor de 1 a 7.";
        } else {
            $print = countStar($numero);
        }

        $_SESSION["captcha"] = rand(1000, 9999);
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
            <label>Captcha:</label>
            <strong style="font-size: 20px;"><?= $_SESSION["captcha"] ?></strong>
        </div>

        <div>
            <label>Digite o captcha:</label>
            <input type="text" name="captcha" required>
        </div>
        <div>
            <input type="submit" value="Encontrar">
        </div>
    </form>

    <div class="resultado">
        <?= isset($print) ? $print : '' ?>
    </div>
</body>

</html>