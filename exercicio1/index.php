<!DOCTYPE html>
<html lang="PT-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/exercicio1/style.css">
    <title>Exercicio1</title>
</head>
<body>
    <h1>Estou no exercício 1</h1>
    <form action="/exercicio1" method="post">
         <div>
            <label for="valuel">Digite o primeiro valor:</label>
            <input type="number" name="value1">
         </div>
         <div>
            <label for="valuel">Digite o segundo valor:</label>
            <input type="number" name="value2">
         </div>
         <input type="submit" value="Enviar">
    </form>

    <?php
        $value1 = $_POST['value1'];
        $value2 = $_POST['value2'];

        $total =  $value1 +  $value2;

        if ($total > 20) {
            $total = $total + 8;
        }
        else {
            $total = $total - 5;
        }
        echo "<div class='result'>O resultado foi: $total</div>"
    ?>
</body>
</html>