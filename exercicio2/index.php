<?php
session_start();

if (!isset($_SESSION['captcha'])) {
    $_SESSION['captcha'] = rand(1000, 9999);
}

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Exercicio 2</title>
</head>
<body>
    <h1>Exercicio 2</h1>
    <form action="" method="post">
        <div>
            <label for="numero">Digite o primeiro valor</label>
            <input type="number" name="numero1">
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
            $_SESSION['captcha'] = rand(1000, 9999); // novo captcha
            exit;
        }
	    
		$number = filter_input(INPUT_POST, "numero1", FILTER_VALIDATE_INT);


		if ($number === false) {
			echo "Por favor, insira um número válido.";
		} else {

			$numExibe = htmlspecialchars($number);

			if ($number % 7 == 0) {
			echo "O número $number é divisível por 7.";
			}

			if ($number % 8 == 0) {
			echo "O número $number é divisível por 8.";
			} elseif ($number % 9 == 0) {
			echo "O número $number é divisível por 9.";
			} elseif ($number % 7 != 0 && $number % 8 != 0 && $number % 9 != 0) {
			echo "O número $number não é divisível por 7, 8 ou 9.";
			}
		}

        $_SESSION['captcha'] = rand(1000, 9999);		
	}
	?>

</body>
</html>