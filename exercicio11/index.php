<?php
    include "src/gerar.php";
    $mensagem = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mensagem = calculaMultiplos($_POST["base"], $_POST["quantidade"]);
    $tabela = getHistorico();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Múltiplos</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

    <div class="titulo">
        <h3>Sequência de Múltiplos</h3>
    </div>

    <form id="formMultiplos" action="" method="post">

        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="number" id="base" name="base" min="1" max="50" required>
                        <label for="base">Número base (de 1 a 50)</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="number" id="quantidade" name="quantidade" min="1" max="15" required>
                        <label for="quantidade">Quantidade de Múltiplos (de 1 a 15)</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 center-align">
                <button type="submit" class="btn">Gerar e Salvar</button>
            </div>
        </div>

    </form>

    <div class="resultado center-align">
        <?= isset($mensagem) ? $mensagem : '' ?>
    </div>

    <section id="historico">
        <h5>Histórico de Sequências</h5>

        <div id="tabela-sequencias">
            <?= $tabela ?? '' ?>
        </div>

        <a href="index.php"><button>Atualizar</button></a>

    </section>

</body>
</html>