<?php
session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
}

$numero1 = rand(1, 9);
$numero2 = rand(1, 9);
$_SESSION['captcha_resultado'] = $numero1 + $numero2;
?>

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

        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>
        </div>
        <div>
            <label for="idade">Idade:</label>
            <input type="number" name="idade" required>
        </div>
        <div>
            <label for="categoria">Qual a sua categoria da CNH?</label>
            <select type="text" name="categoria">
                <option value=""> Selecionar </option>
                <option value="A">A</option>
                <option value="B">B</option>
            </select>
        </div>

        <div>
            <label>Quanto é <?php echo $numero1 . " + " . $numero2; ?> ?</label>
            <input type="number" name="captcha" required>
        </div>

        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("<p style='color:red;'>Erro: CSRF token inválido.</p>");
    }

        if ($_POST['captcha'] != $_SESSION['captcha_resultado']) {
        die("<p style='color:red;'>Captcha incorreto! Tente novamente.</p>");
    }

        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $categoria = $_POST['categoria'];

        if ($categoria == 'B' && $idade >= 25) {
            echo $nome . ": APTO PARA CONTRATAÇÃO";
        } else {
            echo $nome . " : NÃO APTO";
        }
    }
    ?>
</body>
</html>