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

        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="numero">Digite um número:</label>
            <input type="number" name="numero" id="numero" required>

            <input type="submit" value="Calcular Média">
        </form>

        <div id="resultado">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $numero = filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT);

                if ($numero === false || $numero <= 0) {
                    echo "<p style='color:red'>Por favor, digite um número inteiro maior que zero.</p>";
                } elseif ($numero > 1000) {
                    echo "<p style='color:red'>Por segurança, digite um número até 1.000 para não sobrecarregar o sistema.</p>";
                } else {
                    $soma = 0;
                    $sequencia = "";

                    for ($i = 1; $i <= $numero; $i++) {
                        $sequencia .= $i . " ";
                        $soma += $i;
                    }

                    $media = $soma / $numero;

                    echo "<p><b>Contagem dos números:</b><br>" . htmlspecialchars($sequencia) . "</p>";
                    echo "<p><b>Resultado da média:</b> " . number_format($media, 2, ',', '.') . "</p>";
                }
            }
            ?>

        </div>
</body>

</html>