<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Exercicio 2</title>
</head>
<body>
    <h1>Exercicio 2</h1>
    <form action="/exercicio2" method="post">
        <div>
            <label for="numero1">Digite o primeiro valor</label>
            <input type="number" name="numero1">
        </div>
        <div>
            <label for="numero2">Digite o segundo valor</label>
            <input type="number" name="numero2">
        </div>
            <input type="submit" value="Enviar">
    </form>

    <?php
        $number = $_POST["numero1"];
        $number = $_POST["numero2"];

        if ($number % 7 == 0) {
        echo "O número $number é divisível por 7.";
        } 
        if ($number % 8 == 0) {
        echo "O número $number é divisível por 8.";
        } 
        elseif ($number % 9 == 0) {
        echo "O número $number é divisível por 9.";
        } 
        else {
        echo "O número $number não é divisível por 7, 8 ou 9.";
        }
?>
</body>
</html>