<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Preços</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/stylle.css">

</head>
<body>

    <form id="formPreço" method="post">

        <h4 class="center-align">Cadastro de Preços</h4>

        <p class="center-align">
            Digite os preços dos produtos, e para encerrar informe <b>-1</b>.
        </p>

        <p class="center-align">
            Faixa considerada: <b>R$ 50,00 a R$ 150,00</b>
        </p>

        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">attach_money</i>
                        <input type="number" id="preço" name="preço" step="0.01" required>
                        <label for="preço">Preço do Produto</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row center-align">
            <input type="submit" value="Enviar" class="btn waves-effect waves-light">
        </div>

        <div class="resultado">
            <?= $resultado ?? "" ?>
        </div>

    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>
