<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo Financeiro</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>

    <div style="margin-top: 40px;"></div>

    <div class="container">

        <div class="row">
            <div class="col s12 l10 offset-l1">

                <div class="card custom-card">

                    <div class="card-content">
                        <div class="center-align" style="margin-bottom: 30px;">
                            <h4 style="margin: 0;">Simulador de Rendimentos</h4>
                            <p class="text-highlight" style="margin-top: 5px;">Compare a evolução patrimonial</p>
                        </div>

                        <form id="formCalculo" method="post">
                            <div class="row">

                                <div class="col s12 m6" style="padding: 0 20px;">
                                    <div class="section-label">
                                        <i class="material-icons left tiny">arrow_downward</i> Começa Menor
                                    </div>

                                    <div class="input-field">
                                        <i class="material-icons prefix">person_outline</i>
                                        <input id="nome1" name="nome1" type="text" required value="<?= $_POST['nome1'] ?? 'Maria' ?>">
                                        <label for="nome1">Nome</label>
                                    </div>
                                    <div class="input-field">
                                        <i class="material-icons prefix">monetization_on</i>
                                        <input id="valor1" name="valor1" type="number" step="0.01" required value="<?= $_POST['valor1'] ?? '5000' ?>">
                                        <label for="valor1">Capital Inicial (R$)</label>
                                    </div>
                                    <div class="input-field">
                                        <i class="material-icons prefix">show_chart</i>
                                        <input id="taxa1" name="taxa1" type="number" step="0.01" required value="<?= $_POST['taxa1'] ?? '2' ?>">
                                        <label for="taxa1">Taxa Mensal (%)</label>
                                    </div>
                                </div>

                                <div class="col s12 m6 divider-vertical" style="padding: 0 20px;">
                                    <div class="section-label">
                                        <i class="material-icons left tiny">arrow_upward</i> Começa Maior
                                    </div>

                                    <div class="input-field">
                                        <i class="material-icons prefix">person</i>
                                        <input id="nome2" name="nome2" type="text" required value="<?= $_POST['nome2'] ?? 'João' ?>">
                                        <label for="nome2">Nome</label>
                                    </div>
                                    <div class="input-field">
                                        <i class="material-icons prefix">monetization_on</i>
                                        <input id="valor2" name="valor2" type="number" step="0.01" required value="<?= $_POST['valor2'] ?? '8000' ?>">
                                        <label for="valor2">Capital Inicial (R$)</label>
                                    </div>
                                    <div class="input-field">
                                        <i class="material-icons prefix">trending_flat</i>
                                        <input id="taxa2" name="taxa2" type="number" step="0.01" required value="<?= $_POST['taxa2'] ?? '1' ?>">
                                        <label for="taxa2">Taxa Mensal (%)</label>
                                    </div>
                                </div>

                            </div>

                            <div class="center-align" style="margin-top: 20px; margin-bottom: 10px;">
                                <button type="submit" class="btn btn-action waves-effect waves-light">
                                    <i class="material-icons right">calculate</i>
                                    Realizar Cálculo
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <?php if (isset($mensagem) && !empty($mensagem)): ?>
            <div class="row">
                <div class="col s12 l8 offset-l2">
                    <div class="result-box center-align z-depth-1">
                        <h5 style="margin-top:0;"><i class="material-icons" style="vertical-align: middle;">check_circle</i> Resultado</h5>
                        <div style="font-size: 1.1rem; line-height: 1.5;">
                            <?= $mensagem ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col s12 l10 offset-l1">
                <div class="card custom-card">
                    <div class="card-content">
                        <span class="card-title text-highlight" style="font-size: 1.2rem; font-weight: bold;">Histórico de Consultas</span>

                        <table class="highlight centered responsive-table custom-table">
                            <thead>
                                <tr>
                                    <th>Data/Hora</th>
                                    <th>Pessoa 1</th>
                                    <th>Pessoa 2</th>
                                    <th>Meses</th>
                                    <th>Resultado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?= $historico ?? '<tr><td colspan="5">Sem registros no momento.</td></tr>' ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="center-align" style="margin-top: 15px; margin-bottom: 40px;">
                    <a href="index.php" class="link-clean">Limpar tela e recomeçar</a>
                </div>
            </div>
        </div>

    </div>

</body>

</html>