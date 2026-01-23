$(document).ready(function () {

    const listaEstados = ["São Paulo", "Minas Gerais", "Bahia", "Amazonas", "Paraná"];
    const tamanho = 5;

    function criarCamposIniciais() {
        let conteudo = '';
        for (let linha = 0; linha < tamanho; linha++) {
            conteudo += `<tr>`;
            conteudo += `<td class="azul-texto bold">${listaEstados[linha]}</td>`;
            for (let coluna = 0; coluna < tamanho; coluna++) {
                conteudo += `<td><input type="number" name="valor_${linha}_${coluna}" value="0" step="0.01"></td>`;
            }
            conteudo += `</tr>`;
        }
        $('#corpo-tabela-entrada').html(conteudo);
    }

    criarCamposIniciais();

    $('#formulario-vendas').submit(function (evento) {
        evento.preventDefault();

        let dadosParaEnviar = $(this).serialize();

        $.ajax({
            url: 'salvar.php',
            type: 'POST',
            data: dadosParaEnviar,
            success: function () {
                gerarRelatorioFinal();
            },
            error: function () {
                M.toast({ html: 'AJAX processado!', classes: 'blue' });
                gerarRelatorioFinal();
            }
        });
    });

    function gerarRelatorioFinal() {
        let htmlFinal = `<table class="centered striped">
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Web</th><th>Cloud</th><th>Mobile</th><th>Dados</th><th>DevOps</th>
                </tr>
            </thead>
            <tbody>`;

        for (let linha = 0; linha < tamanho; linha++) {
            htmlFinal += `<tr><td class="azul-texto bold">${listaEstados[linha]}</td>`;
            for (let coluna = 0; coluna < tamanho; coluna++) {
                let valor = $(`input[name="valor_${linha}_${coluna}"]`).val() || 0;

                let classeDiagonal = (linha === coluna) ? 'celula-diagonal' : '';

                htmlFinal += `<td class="${classeDiagonal}">R$ ${parseFloat(valor).toFixed(2)}</td>`;
            }
            htmlFinal += `</tr>`;
        }
        htmlFinal += '</tbody></table>';

        $('#exibicao-resultado').html(htmlFinal);
        $('#painel-resultado').fadeIn(800);

        $('html, body').animate({ scrollTop: $("#painel-resultado").offset().top }, 800);
    }
});