<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar Pirâmide de Texto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/stylle.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

    <div class="titulo center-align">
        <h3>Gerar Pirâmide de Texto</h3>
    </div>

    <div class="row">

        <div class="col s12 m6 l4">
            <form id="Piramide" method="post" class="left-form">

                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" id="palavra" name="palavra" maxlength="20" required>
                                <label for="palavra">Qual a Palavra? (máx de 20 caracteres)</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="number" id="niveis" name="niveis" min="1" max="10" required>
                                <label for="niveis">Número de níveis (1 a 10)</label>
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
        </div>

        <div class="col s12 m6 l8">
            <div class="resultado center-align" id="mensagem">
            </div>

            <div class="TituloHistorico">
                <h4>Histórico de Pirâmides</h4>
            </div>

            <div class="piramide-container" id="historicoPiramide">
            </div>

            <div class="center-align">
                <button class="btn" id="btnAtualizar">Atualizar</button>
            </div>

        </div>

    </div>

</body>
</html>