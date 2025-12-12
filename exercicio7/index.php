<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Coworking Titans</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>Conheça o nosso espaço no Rio de Janeiro &#x1F4CD;</h1>
        <p><i>Nosso <b>coworking</b> oferece um ambiente moderno, confortável e totalmente equipado para você e sua equipe trabalharem com produtividade e comodidade</i></p>
    </header>

    <nav>
        <ul>
            <li><a href="#"><b>Início</b></a></li>
            <li>
                <a href="#"><b>Reservas</b></a>
                <ul>
                    <li><a href="#">Nova Reserva</a></li>
                    <li><a href="#">Consultar</a></li>
                    <li><a href="#">Cancelar</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><b>Planos</b></a>
                <ul>
                    <li><a href="#">Básico</a></li>
                    <li><a href="#">Premium</a></li>
                </ul>
            </li>
            <li><a href="#"><b>Contato &#x2709;</b></a></li>
        </ul>
    </nav>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h3>Reserva de Salas</h3>
        <label for="empresa">Nome da Empresa:</label>
        <input type="text" id="empresa" name="empresa" required>
        <p>

            <label for="plano">Tipo de Plano:</label>
            <select id="plano" name="plano" required>
                <option value="">Selecione</option>
                <option value="Premium">Premium</option>
                <option value="Básico">Básico</option>
            </select><br><br>

            <button type="submit">
                <h3>Gerar Comprovante</h3>
            </button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $empresa = trim($_POST['empresa'] ?? '');
        $plano   = $_POST['plano'];

        $dias = 0;
        $planoValido = false;

        switch ($plano) {
            case "Premium":
                $dias = 14;
                $planoValido = true;
                break;
            case "Básico":
                $dias = 5;
                $planoValido = true;
                break;
            default:
                echo "<p style='color:red; font-weight:bold;'>Erro: Plano inválido selecionado.</p>";
        }

        echo "<div class='comprovante'>";
        echo "<b>&#x1F5A8; Comprovante da Reserva</b><br>";
        echo "Empresa: " . htmlspecialchars($empresa) . "<br>";
        echo "Plano: " . htmlspecialchars($plano) . "<br>";
        echo "Duração da Reserva: " . (int)$dias . " dias<br>";
        echo "</div>";
    }
    ?>

    <footer>
        <p>&copy; 2025 Coworking Titans.</p>
    </footer>

</body>

</html>