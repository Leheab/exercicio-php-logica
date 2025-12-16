<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Familia Silva</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Classificação de Faixa Etária e Parentesco da Familia Silva</h1>
    <form method="post">
        <div>
            <label for="idade1"> Idade do primeiro do primeiro membro:</label>
            <input type="number" name="idade1" required>
        </div>
        <div>
            <label for="idade2">Idade do segundo membro:</label>
            <input type="number" name="idade2" required>
        </div>
        <div>
            <label for="idade3">Idade do terceiro membro:</label>
            <input type="number" name="idade3" required>
        </div>

        <input type="submit" value="Consultar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $idade1 = intval($_POST["idade1"]);
        $idade2 = intval($_POST["idade2"]);
        $idade3 = intval($_POST["idade3"]);

        echo "<p>Idades processadas: " .
            htmlspecialchars($idade1) . ", " .
            htmlspecialchars($idade2) . ", " .
            htmlspecialchars($idade3) .
            "</p>";

        echo "<p><strong>Resultado: </strong>";

        if ($idade1 == $idade2 && $idade2 == $idade3) {
            echo "TRIGÊMEOS";
        } else if ($idade1 == $idade2 || $idade1 == $idade3 || $idade2 == $idade3) {
            echo "GÊMEOS";
        } else {
            echo "IDADES DISTINTAS";
        }

        echo "</p>";
    }
    ?>

</body>

</html>