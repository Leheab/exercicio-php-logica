<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titans Lab | Sistema de Análise de Fármacos</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="ambiente-laboratorio">

    <header class="topo-titans">
        <div class="container">
            <div class="logo-wrapper">
                <div class="logo-icone">
                    <i class="material-icons">biotech</i>
                </div>
                <div class="logo-texto">
                    TITANS <span class="destaque-azul">LAB</span>
                </div>
            </div>
        </div>
    </header>

    <main class="container">
        <div class="row section">
            <div class="col s12 l8 offset-l2">

                <div class="card painel-clean">
                    <div class="card-content">
                        <div class="instrucao-análise">
                            <span class="badge-status">Análise Farmacocinética</span>
                            <h4 class="titulo-sessao">Simulador de Eliminação</h4>
                            <p class="descricao-sessao">Insira os dados técnicos para calcular o tempo de depuração.</p>
                        </div>

                        <form method="post" class="formulario-clean">
                            <div class="row">
                                <div class="col s12 m6">
                                    <div class="input-field campo-clean">
                                        <i class="material-icons prefix">science</i>
                                        <input id="conc_inicial" name="conc_inicial" type="number" step="0.01" required
                                            value="<?= $_POST['conc_inicial'] ?? '' ?>">
                                        <label for="conc_inicial">Conc. Inicial (mg/L)</label>
                                    </div>
                                </div>
                                <div class="col s12 m6">
                                    <div class="input-field campo-clean">
                                        <i class="material-icons prefix">shield</i>
                                        <input id="conc_minima" name="conc_minima" type="number" step="0.01" required
                                            value="<?= $_POST['conc_minima'] ?? '' ?>">
                                        <label for="conc_minima">Limite Seguro (mg/L)</label>
                                    </div>
                                </div>
                            </div>

                            <div class="center-align" style="margin-top: 20px;">
                                <button type="submit" class="btn-large botao-titans waves-effect waves-light">
                                    Iniciar Processamento
                                    <i class="material-icons right">arrow_forward</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <?php if (isset($tempo_total)): ?>
                    <div class="laudo-tecnico animate-fade-in">
                        <div class="laudo-header">
                            <span class="titulo-laudo">RELATÓRIO TÉCNICO DE SAÍDA</span>
                            <i class="material-icons">file_download</i>
                        </div>
                        <div class="laudo-corpo">
                            <div class="resultado-principal">
                                <span class="rotulo">Tempo Estimado para o Limite Seguro:</span>
                                <div class="valor-foco">
                                    <?= $tempo_total ?> <small>HORAS</small>
                                </div>
                            </div>

                            <div class="detalhamento-log">
                                <p class="titulo-log">Progressão de Depuração (Log Horário):</p>
                                <div class="scroll-log">
                                    <?= $lista_progressao_html ?? '' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="card painel-tabela">
                    <div class="card-content">
                        <h6 class="titulo-tabela">Registro de Atividades Recentes</h6>
                        <table class="tabela-titans highlight">
                            <thead>
                                <tr>
                                    <th>Data / Hora</th>
                                    <th>Inicial</th>
                                    <th>Limite</th>
                                    <th>Resultado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?= $linhas_tabela ?? '<tr><td colspan="4" class="center grey-text">Aguardando dados...</td></tr>' ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="center-align action-footer">
                    <a href="index.php" class="link-reset">Limpar parâmetros e nova consulta</a>
                </div>

            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>