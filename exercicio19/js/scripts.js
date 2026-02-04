$(document).ready(function () {

    const lista_estados = ["São Paulo", "Minas Gerais", "Bahia", "Amazonas", "Paraná"];
    const total_de_posicoes = 5;

    function criarCamposDeVenda() {
        let conteudo_da_tabela = '';

        for (let linha = 0; linha < total_de_posicoes; linha++) {
            conteudo_da_tabela += '<tr>';
            conteudo_da_tabela += '<td class="azul-texto bold">' + lista_estados[linha] + '</td>';

            for (let coluna = 0; coluna < total_de_posicoes; coluna++) {
                conteudo_da_tabela += '<td><input type="number" name="valor_' + linha + '_' + coluna + '" value="0" step="0.01"></td>';
            }
            conteudo_da_tabela += '</tr>';
        }
        $('#corpo-tabela-entrada').html(conteudo_da_tabela);
    }

    criarCamposDeVenda();

    $('#formulario-vendas').submit(function (evento) {
        evento.preventDefault();

        let dados_do_formulario = $(this).serialize();

        $.ajax({
            url: 'salvar.php',
            type: 'POST',
            data: dados_do_formulario,
            dataType: 'json',
            success: function (resposta_do_servidor) {
                if (resposta_do_servidor.status === 'sucesso') {
                    M.toast({ html: resposta_do_servidor.mensagem, classes: 'green' });
                    gerarRelatorioFinal();
                } else {
                    M.toast({ html: resposta_do_servidor.mensagem, classes: 'red' });
                }
            },
            error: function () {
                M.toast({ html: 'Erro na conexão com o servidor.', classes: 'red' });
            }
        });
    });

    function gerarRelatorioFinal() {
        let tabela_resultado = '<table class="centered striped"><thead><tr><th>Estado</th><th>Web</th><th>Cloud</th><th>Mobile</th><th>Dados</th><th>DevOps</th></tr></thead><tbody>';

        for (let linha = 0; linha < total_de_posicoes; linha++) {
            tabela_resultado += '<tr><td class="azul-texto bold">' + lista_estados[linha] + '</td>';

            for (let coluna = 0; coluna < total_de_posicoes; coluna++) {
                let valor_venda = $('input[name="valor_' + linha + '_' + coluna + '"]').val();

                let classe_diagonal = (linha === coluna) ? 'celula-diagonal' : '';

                tabela_resultado += '<td class="' + classe_diagonal + '">R$ ' + parseFloat(valor_venda).toFixed(2) + '</td>';
            }
            tabela_resultado += '</tr>';
        }

        tabela_resultado += '</tbody></table>';

        $('#exibicao-resultado').html(tabela_resultado);
        $('#painel-resultado').fadeIn(800);

        $('html, body').animate({
            scrollTop: $("#painel-resultado").offset().top
        }, 800);
    }
});