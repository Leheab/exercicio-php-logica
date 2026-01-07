<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titans Artesanais | Sistema de Avaliação</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="fundo-artesanal">

    <header class="topo-pagina">
        <div class="container">
            <div class="bloco-logotipo">
                <div class="texto-logo">
                    TITANS
                    <span class="sub-logo">artesanais</span>
                </div>
            </div>
        </div>
    </header>

    <main class="container">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">

                <div class="card painel-entrada">
                    <div class="card-content">
                        <div class="cabecalho-centro">
                            <span class="etiqueta-voto" id="contador-label">Avaliação 1 de 15</span>
                            <h5 class="titulo-formulario">Feedback do Produto</h5>
                            <p class="legenda-formulario">Insira a nota de satisfação (0 a 10)</p>
                        </div>

                        <form id="formularioNota">
                            <div class="input-field campo-custom">
                                <i class="material-icons prefix">auto_awesome</i>
                                <input id="campo-nota" type="number" step="0.1" min="0" max="10" required autofocus>
                                <label for="campo-nota">Nota da Avaliação</label>
                            </div>

                            <div class="center-align" style="margin-top: 20px;">
                                <button type="submit" id="btn-registrar" class="btn-large botao-natural waves-effect">
                                    Registrar Nota
                                    <i class="material-icons right">check</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Painel de Resultados (Simulando AJAX) -->
                <div id="painel-resultados" class="cartao-resultados" style="display: none;">
                    <div class="topo-resultados">
                        <span class="titulo-lista">HISTÓRICO DO LOTE</span>
                        <i class="material-icons">spa</i>
                    </div>
                    <div class="corpo-tabela">
                        <table class="tabela-estilizada">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota</th>
                                    <th>Classificação</th>
                                </tr>
                            </thead>
                            <tbody id="tabela-corpo">
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="center-align" style="margin-top: 30px;">
                    <a href="index.html" class="link-reset">Limpar lote e reiniciar</a>
                </div>

            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        let totalNotas = 0;
        const limite = 15;

        document.getElementById('formularioNota').addEventListener('submit', function(e) {
            e.preventDefault();

            if (totalNotas >= limite) return;

            const input = document.getElementById('campo-nota');
            const nota = parseFloat(input.value);

            totalNotas++;

            adicionarNotaNaTabela(nota, totalNotas);

            input.value = '';
            input.focus();

            if (totalNotas < limite) {
                document.getElementById('contador-label').innerText = `Avaliação ${totalNotas + 1} de 15`;
            } else {
                finalizarLote();
            }
        });

        function adicionarNotaNaTabela(nota, id) {
            const painel = document.getElementById('painel-resultados');
            const corpo = document.getElementById('tabela-corpo');

            painel.style.display = 'block';

            const ehSatisfatorio = nota >= 6;
            const status = ehSatisfatorio ? 'Satisfatória' : 'Insatisfatória';
            const classe = ehSatisfatorio ? 'cor-verde' : 'cor-vermelha';
            const icone = ehSatisfatorio ? 'sentiment_satisfied' : 'sentiment_dissatisfied';

            const linha = `
                <tr class="animar-linha">
                    <td>${id}</td>
                    <td class="nota-valor">${nota.toFixed(1)}</td>
                    <td class="${classe} status-texto">
                        <i class="material-icons tiny">${icone}</i> ${status}
                    </td>
                </tr>
            `;

            corpo.innerHTML = linha + corpo.innerHTML;
        }

        function finalizarLote() {
            document.getElementById('btn-registrar').disabled = true;
            document.getElementById('campo-nota').disabled = true;
            document.getElementById('contador-label').innerText = "Processo Concluído";
            document.getElementById('contador-label').style.background = "#5B6D44";
            M.toast({
                html: 'Limite de 15 avaliações atingido!',
                classes: 'rounded'
            });
        }
    </script>
</body>

</html>