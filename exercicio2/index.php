<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Exercicio 2</title>
</head>

<body>
    <h1>Exercicio 2</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
            <label for="numero">Digite o primeiro valor</label>
            <input type="number" name="numero1">
        </div>

        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = filter_input(INPUT_POST, "numero1", FILTER_VALIDATE_INT);

        if ($number === false) {
            echo "Por favor, insira um número válido.";
        } else {

            $numSeguro = htmlspecialchars($number);
            $encontrouDivisor = false;

            if ($number % 7 == 0) {
                echo "O número <b>$numSeguro</b> é divisível por 7.</p>";
                $encontrouDivisor = true;
            }

            if ($number % 8 == 0) {
                echo "<p>O número <b>$numSeguro</b> é divisível por 8.</p>";
                $encontrouDivisor = true;
            } elseif ($number % 9 == 0) {
                echo "<p>O número <b>$numSeguro</b> é divisível por 9.</p>";
                $encontrouDivisor = true;
            }

            if (!$encontrouDivisor) {
                echo "<p>O número <b>$numSeguro</b> não é divisível por 7, 8 ou 9.</p>";
            }
        }
    }
    ?>

</body>

</html>