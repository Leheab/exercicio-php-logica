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
    <form action="" method="post">
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $value1 = filter_input(INPUT_POST, 'value1', FILTER_VALIDATE_INT);
            $value2 = filter_input(INPUT_POST, 'value2', FILTER_VALIDATE_INT);

            if ($value1 === false || $value2 === false) {
                echo "<div class='result erro'>Por favor, digite números válidos.</div>";
            } else {
            $total =  $value1 +  $value2;

            if ($total > 20) {
                $total = $total + 8;
            }
            else {
                $total = $total - 5;
            }
            echo "<div class='result'>O resultado foi:" . htmlspecialchars($total) . "</div>";
        }
    }    
    ?>
</body>
</html>