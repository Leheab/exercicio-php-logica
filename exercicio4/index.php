<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Exercicio 4</title>
</head>
<body>
    <h1>Preços dos Produtos:</h1>

    <form action="exercicio4.php" method="post">
        <div>
            <label for="valor1">Insira o primeiro preço:</label>
            <input type="number" name="valor1" step="0.1" required>
        </div>
        <div>
            <label for="valor2">Insira o segundo preço:</label>
            <input type="number" name="valor2" step="0.1" required>
        </div>
        <div>
            <label for="valor3">Insira o terceiro preço:</label>
            <input type="number" name="valor3" step="0.1" required>
        </div>
        
        <input type="submit" value="Calcular">

    </form>
</body>
</html>