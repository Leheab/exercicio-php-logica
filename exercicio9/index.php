<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu céu</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img src="Gerador-DE-ESTRELAs-20-09-2025.gif" alt="Gerador de Estrelas" class="titulo-gif">
    <h2>Digite um número para ver as estrelas se organizarem em linhas: Cada linha terá tantas estrelas quanto seu número, assim você consegue contar e acompanhar a quantidade visualmente</h2>

    <form method="post" action="">
        <div>
            <label for="estrela">
                <h2>Quantas estrelas você quer desenhar?</h2>
            </label>
            <input type="number" name="estrela" id="estrela" min="1" max="100" required>
        </div>
        <input type="submit" value="Gerar Padrão">
    </form>

    <div class="resultado">
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $numero = filter_input(INPUT_POST, 'estrela', FILTER_SANITIZE_NUMBER_INT);

            if ($numero > 0 && $numero <= 100) {


                echo "<h3>Você escolheu " . htmlspecialchars($numero) .  "</h3>";

                for ($cadalinha = 1; $cadalinha <= $numero; $cadalinha++) {

                    $linha = "";

                    $linha = str_repeat("*", $cadalinha);

                    if ($cadalinha == 1) {
                        echo "<p>" . htmlspecialchars($linha) . " (1 estrela)</p>";
                    } else {
                        echo "<p>" . htmlspecialchars($linha) . " ($cadalinha estrelas)</p>";
                    }
                }
            } elseif ($numero > 100) {
                echo "<p style='color:red'>Por segurança, o número máximo permitido é 100.</p>";
            } else {
                echo "<p style='color:red'>Por favor, digite um número válido maior que zero.</p>";
            }
        }
        ?>
    </div>

</body>

</html>