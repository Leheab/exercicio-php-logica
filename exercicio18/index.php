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
                            <select name="aluno_nome" id="aluno_nome" required>
                                <option value="" disabled selected>Selecionar Aluno</option>
                                <option>Davi Leandro</option>
                                <option>Enedson Gomes</option>
                                <option>Fernanda Maressa</option>
                                <option>Julia Anjos</option>
                                <option>Letícia Helena</option>
                                <option>Rayane Duarte</option>
                                <option>Valéria Mazok</option>
                                <option>Jean Prado</option>
                            </select>
                        </div>

                        <h2 class="subtitulo-fluxo azul-texto">Atividades Realizadas</h2>
                        <p class="legenda-ajuda">Digite o número do NVT do card da atividade realizada (Ex: 10)</p>

                        <div class="row grade-nvt">
                            <?php for ($i = 1; $i <= 10; $i++): ?>
                                <div class="input-field col s6 m4">
                                    <input name="nvts_aluno[]" type="number" class="validate" required>
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
                            <select name="mentor_nome" id="mentor_nome" required>
                                <option value="" disabled selected>Selecionar Mentor</option>
                                <option>Edmar Gomes</option>
                                <option>Liliane Paixão</option>
                                <option>Pamela Neco</option>
                            </select>
                        </div>

                        <h2 class="subtitulo-fluxo laranja-texto">Bloqueios Identificados</h2>
                        <p class="legenda-ajuda">Digite o número do NVT do card bloqueado ou que precisa de correção (Ex: 10)</p>

                        <div class="row grade-nvt">
                            <?php for ($i = 1; $i <= 10; $i++): ?>
                                <div class="input-field col s6 m4">
                                    <input name="nvts_mentor[]" type="number" class="validate" required>
                                    <label>NVT</label>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="center-align area-acao">
                <button type="submit" class="btn-principal waves-effect waves-light" id="btn-analisar">
                    Comparar Atividades
                </button>
            </div>
        </form>

        <div id="painel-resultados" class="secao-resultado" style="display: none;"></div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>