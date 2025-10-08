<?php
    include "src/diaSemana.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $print = diaSemana($_POST["numero"]);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"/>
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
        <?= isset($print) ? $print : '' ?>
    </div>
</body>
</html>