<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Exercicio 3 - CNH</title>
</head>
<body>
    <h1>Consultar online dados de sua habilitação de trânsito:</h1>
    <form action="" method="post">
        <div>
            <label for="nome">Nome:</label>
            <input type="nome" name="nome">
        </div>
        <div>
            <label for="idade">Idade:</label>
            <input type="number" name="idade">
        </div>
        <div>
            <label for="cateroria">Qual a sua categoria da CNH?</label>
            <select type="categoria" name="categoria">
            <option value=""> Selecionar </option>
            <option value="A">A</option>
            <option value="B">B</option>
            </select>
        </div>

        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $categoria = $_POST['categoria'];

    if ($categoria == 'B' && $idade >= 25) {
        echo $nome . " APTO PARA CONTRATAÇÃO";
    } else {
        echo $nome . " NÃO APTO";
    }
    }
    ?>
</body>
</html>