<?php
session_start();

if (!isset($_SESSION['captcha'])) {
    $_SESSION['captcha'] = rand(1000, 9999);
}
?>

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
            <input type="number" name="value1" required>
        </div>
        <div>
            <label for="valuel">Digite o segundo valor:</label>
            <input type="number" name="value2" required>
        </div>

        <div>
            <label>Digite o Captcha: <strong><?php echo $_SESSION['captcha']; ?></strong></label>
            <input type="number" name="captcha_input" required>
        </div>

        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if ($_POST['captcha_input'] != $_SESSION['captcha']) {
            echo "<div class='result erro'>Captcha incorreto. Tente novamente.</div>";

            $_SESSION['captcha'] = rand(1000, 9999);
            exit;
        }
        $value1 = filter_input(INPUT_POST, 'value1', FILTER_VALIDATE_INT);
        $value2 = filter_input(INPUT_POST, 'value2', FILTER_VALIDATE_INT);

        if ($value1 === false || $value2 === false) {
            echo "<div class='result erro'>Por favor, digite números válidos.</div>";
        } else {
            $total =  $value1 +  $value2;

            if ($total > 20) {
                $total = $total + 8;
            } else {
                $total = $total - 5;
            }
            echo "<div class='result'>O resultado foi:" . htmlspecialchars($total) . "</div>";
        }

        $_SESSION['captcha'] = rand(1000, 9999);
    }
    ?>
</body>

</html>