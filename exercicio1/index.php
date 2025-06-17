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
            <input type="number" name="valuel">
         </div>
         <div>
            <label for="valuel">Digite o segundo valor:</label>
            <input type="number" name="valuel">
         </div>
         <input type="submit" value="Enviar">
    </form>
    
    <?php
        $valuel1= $_POST['valuel1'];
        $valuel2= $_POST['valuel2'];

        $total = $valuel1 + $valuel2;
    
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