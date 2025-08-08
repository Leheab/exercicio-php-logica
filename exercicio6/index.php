<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Verificador de Dias da Semana:</title>
</head>
<body>
    
    <h1> Verificar Dia da Semana:</h1>

    <form action="" method="post">
        <div>
            <label for="numero">Digite um número de 1 a 7 para verificar o dia correspondente:</label>
            <input type="number" name="numero" required>
        </div>
        <div>
            <input type="submit" value="Encontrar">
        </div>
    </form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];

        switch ($numero) {
            case 1:
                $mensagem = "Domingo";
                break;
            case 2:
                $mensagem = "Segunda-feira";
                break;
            case 3:
                $mensagem = "Terça-feira";
                break;
            case 4:
                $mensagem = "Quarta-feira";
                break;
            case 5:
                $mensagem = "Quinta-feira";
                break;
            case 6:
                $mensagem = "Sexta-feira";
                break;
            case 7:
                $mensagem = "Sabado";
                break;
            default:
                $mensagem = "Número inválido, por favor digite  um número de 1 a 7 para corresponder a um dia da semana.";
        }
        
        echo "<div class='mensagem'> Resultado: $mensagem</div>";
    }
?>

</body>
</html>