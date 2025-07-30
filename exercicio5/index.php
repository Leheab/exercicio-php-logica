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

</body>
</html>