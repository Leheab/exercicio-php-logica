<?php
session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
}

$palavras = ["carro", "gato", "casa", "sol", "lua", "verde", "neve", "flor"];
$palavraEscolhida = $palavras[array_rand($palavras)];
$_SESSION['captcha_palavra'] = $palavraEscolhida;
?>

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

    <form action="" method="post">

        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

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

        <div>
            <label>Digite a palavra: <strong><?php echo $palavraEscolhida; ?></strong></label>
            <input type="text" name="captcha" required>
        </div>

        <input type="submit" value="Calcular">

    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("<p style='color:red;'>Erro: CSRF token inválido.</p>");
        }

        if (!isset($_POST['captcha']) 
            || strtolower($_POST['captcha']) !== strtolower($_SESSION['captcha_palavra'])) {
            die("<p style='color:red;'>Captcha incorreto! Tente novamente.</p>");
        }

        $preco1 = floatval($_POST["valor1"]);
        $preco2 = floatval($_POST["valor2"]);
        $preco3 = floatval($_POST["valor3"]);

        $precos = array($preco1, $preco2, $preco3);
        sort($precos);

        $total = $preco1 + $preco2 + $preco3;
            echo "Preços em ordem crescente:<br>";
        foreach ($precos as $preco) {
            echo "R$ " . number_format($preco, 2, ',', '.') . "<br>";
        }

            echo "Total da compra: R$ " . number_format($total, 2, ',', '.') . "<br>";
    }
    ?>

</body>
</html>