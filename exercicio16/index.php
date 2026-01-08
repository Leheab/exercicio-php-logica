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
                            <h5 class="titulo-formulario" id="titulo-pergunta">Facilidade de realizar a compra</h5>
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
                                    <th>Critério</th>
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
        const criterios = [
            "Facilidade de realizar a compra",
            "Variedade do catálogo",
            "Segurança na navegação",
            "Clareza das fotos dos produtos",
            "Informações nutricionais/técnicas",
            "Opções de pagamento",
            "Tempo de entrega",
            "Custo do frete",
            "Qualidade da embalagem externa",
            "Cuidado no embrulho dos itens",
            "Aroma/Apresentação ao abrir",
            "Qualidade do produto artesanal",
            "Sustentabilidade dos materiais",
            "Atendimento ao cliente",
            "Recomendaria a loja a amigos?"
        ];

        let totalNotas = 0;

        document.getElementById('formularioNota').addEventListener('submit', function(e) {
            e.preventDefault();

            if (totalNotas >= criterios.length) return;

            const input = document.getElementById('campo-nota');
            const nota = parseFloat(input.value);
            const criterioAtual = criterios[totalNotas];

            totalNotas++;

            adicionarNotaNaTabela(nota, totalNotas, criterioAtual);

            input.value = '';
            input.focus();

            if (totalNotas < criterios.length) {
                document.getElementById('contador-label').innerText = `Pergunta ${totalNotas + 1} de 15`;
                document.getElementById('titulo-pergunta').innerText = criterios[totalNotas];
            } else {
                finalizarLote();
            }
        });

        function adicionarNotaNaTabela(nota, id, textoCriterio) {
            const painel = document.getElementById('painel-resultados');
            const corpo = document.getElementById('tabela-corpo');

            painel.style.display = 'block';

            const ehSatisfatorio = nota >= 6;
            const status = ehSatisfatorio ? 'Ok' : 'Ruim';
            const classe = ehSatisfatorio ? 'cor-verde' : 'cor-vermelha';
            const icone = ehSatisfatorio ? 'sentiment_satisfied' : 'sentiment_dissatisfied';

            const linha = `
                <tr class="animar-linha">
                    <td>${id}</td>
                    <td style="font-size: 0.85rem;">${textoCriterio}</td>
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
            document.getElementById('titulo-pergunta').innerText = "Obrigado pelo seu Feedback!";
            document.getElementById('contador-label').innerText = "Concluído";
            document.getElementById('contador-label').style.background = "#5B6D44";
            M.toast({
                html: 'Pesquisa enviada com sucesso!',
                classes: 'rounded'
            });
        }
    </script>
</body>

</html>