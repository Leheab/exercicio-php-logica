<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Monitoramento Térmico</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header class="cabecalho-principal">
        <div class="container">
            <div class="identidade-visual">
                <i class="material-icons">ac_unit</i>
                <span>SISTEMA <small>TEMPERATURA</small></span>
            </div>
        </div>
    </header>

    <main class="container">
        <div class="row">
            <div class="col s12">

                <div class="card card-formulario">
                    <div class="card-content">
                        <span class="card-title cor-primaria-texto">Cadastro de Dados Mensais</span>
                        <p class="instrucao">Informe a temperatura máxima registrada em cada um dos 20 dias abaixo:</p>

                        <form id="formulario-temperatura">
                            <div class="row">
                                <?php for ($i = 1; $i <= 20; $i++): ?>
                                    <div class="input-field col s6 m3 l2">
                                        <input id="dia_<?= $i ?>" type="number" step="0.1" class="validate input-temperatura" required>
                                        <label for="dia_<?= $i ?>">Dia <?= $i ?> (°C)</label>
                                    </div>
                                <?php endfor; ?>
                            </div>

                            <div class="center-align">
                                <button type="submit" class="btn btn-enviar waves-effect waves-light" id="btn-processar">
                                    <i class="material-icons left">send</i>
                                    Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="painel-resultados" class="card card-tabela" style="display: none;">
                    <div class="card-content">
                        <span class="card-title cor-primaria-texto">Relatório Estatístico</span>

                        <table class="highlight centered tabela-resultados">
                            <thead>
                                <tr>
                                    <th>Média Período</th>
                                    <th>Máxima Registrada</th>
                                    <th>Mínima Registrada</th>
                                    <th>Frequência de Calor (>30°C)</th>
                                </tr>
                            </thead>
                            <tbody id="corpo-tabela-resultado">
                            </tbody>
                        </table>

                        <div class="center-align" style="margin-top: 20px;">
                            <button class="btn-flat grey-text" onclick="location.reload()">Limpar Dados</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>