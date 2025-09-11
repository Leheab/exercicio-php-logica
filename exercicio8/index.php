<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descobrindo a Média</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo à sua aventura numérica!</h1>
        <p>Acompanhe a contagem e veja a média do número que você escolher</p>

        <form method="post">
            <label for="numero">Digite um número:</label>
            <input type="number" name="numero" id="numero" required>

            <input type="submit" value="Calcular Média">
        </form>

        <div id="resultado"></div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $numero = $_POST["numero"];
                $soma = 0;

                echo "Contagem dos números: ";
                for ($i = 1; $i <= $numero; $i++) {
                    echo $i . " ";
                    $soma += $i;
                }

                $media = $soma / $numero;
                echo "<br>Resultado da média: " . $media;
            }
            ?>

    </div>
</body>
</html>