$(document).ready(function () {

    const totalDeEquipes = 5;
    const totalDePartidas = 5;
    const nomesDasTurmas = ["Turma Recicla", "Turma Planeta", "Turma Vida", "Turma Futuro", "Turma Verde"];

    function montarTabelaDeEntrada() {
        let linhaDoCabecalho = '<th>Nomes das Turmas</th>';
        for (let numeroDaPartida = 1; numeroDaPartida <= totalDePartidas; numeroDaPartida++) {
            linhaDoCabecalho += '<th>Partida ' + numeroDaPartida + '</th>';
        }
        $('#cabecalho-jogadores').html(linhaDoCabecalho);

        let linhasDaTabela = '';
        for (let linha = 0; linha < totalDeEquipes; linha++) {
            linhasDaTabela += '<tr>';
            linhasDaTabela += '<td class="bold verde-texto">' + nomesDasTurmas[linha] + '</td>';

            for (let coluna = 0; coluna < totalDePartidas; coluna++) {
                linhasDaTabela += '<td><input type="number" name="ponto[' + linha + '][' + coluna + ']" value="0" min="0"></td>';
            }
            linhasDaTabela += '</tr>';
        }
        $('#corpo-matriz').html(linhasDaTabela);
    }

    montarTabelaDeEntrada();

    $('#form-pontos').submit(function (evento) {
        evento.preventDefault();

        let dadosParaEnviar = $(this).serialize();

        $.ajax({
            url: 'processar.php',
            type: 'POST',
            data: dadosParaEnviar,

            success: function (respostaDoServidor) {
                M.toast({ html: 'Dados processados com sucesso!', classes: 'green rounded' });

                $('#sessao-resultados').html(respostaDoServidor);
                $('#sessao-resultados').fadeIn(1000);
            },

            error: function () {
                M.toast({ html: 'Aviso: O servidor (PHP) ainda não está ativo.', classes: 'orange rounded' });
            }
        });
    });

});