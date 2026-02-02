<?php
include __DIR__ . "/src/process.php";
$linhas_historico = buscarHistoricoParaTabela();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novos Titans | Auditoria</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="topo-branco">
        <div class="container">
            <div class="flex-nav">
                <img src="https://yt3.ggpht.com/WVkRtPPNnUvKfL7E_TYyXSzROw9_Z2Nxttf6WIeI5vngaG5UDpWEyBPj5BnakyfMEGDyIbou=s176-c-k-c0x00ffffff-no-rj-mo" alt="Logo Titans">
                <div class="texto-logo">
                    <span class="marca-principal">NOVOS TITANS</span>
                    <span class="separador">|</span>
                    <span class="marca-sistema">AUDITORIA DE FLUXO</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="container">
        <form id="formulario-auditoria" class="margem-topo">
            <div class="row">
                <div class="col s12 l6">
                    <div class="cartao-limpo borda-superior-azul">
                        <span class="tag-identificacao">PESSOA 1 // ALUNO</span>

                        <div class="input-field campo-selecao">
                            <select name="aluno_id" id="aluno_id" required>
                                <option value="" disabled selected>Selecionar Aluno</option>
                                <?php
                                $alunos = buscarUsuarios('aluno');
                                while ($a = mysqli_fetch_assoc($alunos)) {
                                    echo "<option value='{$a['id']}'>" . htmlspecialchars($a['nome']) . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <h2 class="subtitulo-fluxo azul-texto">Atividades Realizadas</h2>
                        <p class="legenda-ajuda">Digite o número do NVT do card da atividade realizada (Ex: 10)</p>

                        <div class="row grade-nvt">
                            <?php for ($i = 1; $i <= 10; $i++): ?>
                                <div class="input-field col s6 m4">
                                    <input name="nvts_aluno[]" type="number" class="validate">
                                    <label>NVT</label>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>

                <div class="col s12 l6">
                    <div class="cartao-limpo borda-superior-laranja">
                        <span class="tag-identificacao">PESSOA 2 // MENTOR</span>

                        <div class="input-field campo-selecao">
                            <select name="mentor_id" id="mentor_id" required>
                                <option value="" disabled selected>Selecionar Mentor</option>
                                <?php
                                $mentores = buscarUsuarios('mentor');
                                while ($m = mysqli_fetch_assoc($mentores)) {
                                    echo "<option value='{$m['id']}'>" . htmlspecialchars($m['nome']) . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <h2 class="subtitulo-fluxo laranja-texto">Bloqueios Identificados</h2>
                        <p class="legenda-ajuda">Digite o número do NVT do card bloqueado ou que precisa de correção (Ex: 10)</p>

                        <div class="row grade-nvt">
                            <?php for ($i = 1; $i <= 10; $i++): ?>
                                <div class="input-field col s6 m4">
                                    <input name="nvts_mentor[]" type="number" class="validate">
                                    <label>NVT</label>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="area-acao">
                <button type="submit" class="btn-principal waves-effect waves-light" id="btn-analisar">
                    Comparar Atividades
                </button>

                <button type="button" class="btn-secundario waves-effect waves-light" id="btn-consultar">
                    Consultar Meu Status
                </button>
            </div>
        </form>

        <div id="painel-resultados" class="secao-resultado" style="display: none;"></div>

        <div class="card cartao-limpo margem-topo">
            <div class="card-content">
                <div class="row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <div class="col s6">
                        <span class="tag-identificacao">HISTÓRICO RECENTE</span>
                    </div>
                </div>
            </div>

            <!-- Tabela -->
            <table class="highlight centered responsive-table">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Participantes</th>
                        <th>Status / Detalhes</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $linhas_historico; ?>
                </tbody>
            </table>
        </div>
        <div id="painel-dashboard" class="card cartao-limpo margem-topo" style="display: none;">
            <div class="card-content">
                <span class="tag-identificacao">DESEMPENHO DA COMPARAÇÃO ATUAL</span>
                <div style="position: relative; height: 200px; width: 100%; margin-top: 20px;">
                    <canvas id="graficoProdutividade"></canvas>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/scripts.js?v=3.0"></script>
</body>

</html>