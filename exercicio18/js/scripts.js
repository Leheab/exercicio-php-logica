let chartInstancia = null;
let estaEnviando = false;

$(document).ready(function () {
    $('select').formSelect();
});

function gerenciarGrafico(dados) {
    const ctx = document.getElementById('graficoProdutividade');
    if (!ctx) return;

    $('#painel-dashboard').show();

    if (chartInstancia) chartInstancia.destroy();

    chartInstancia = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Bloqueios Pendentes', 'Resolvidos'],
            datasets: [{
                data: [dados.pendentes, dados.corrigidos],
                backgroundColor: ['#ef5350', '#66bb6a'],
                borderWidth: 1
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });
}

$('#formulario-auditoria').on('submit', function (e) {
    e.preventDefault();

    if (estaEnviando) return;
    estaEnviando = true;

    const $btn = $('#btn-analisar');
    const textoOriginal = $btn.text();
    $btn.prop('disabled', true).text("Processando...");

    const dadosForm = new FormData(this);

    $.ajax({
        url: 'process.php',
        type: 'POST',
        data: dadosForm,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (res) {
            estaEnviando = false;
            $btn.prop('disabled', false).text(textoOriginal);

            const $painel = $('#painel-resultados');
            $painel.show();

            if (res.status_bloqueio) {
                $painel.html(`<div class="card-panel amber lighten-4 brown-text" style="border:2px solid #ffa000"><b>${res.mensagem}</b></div>`);
            } else if (res.erro) {
                M.toast({ html: res.erro, classes: 'red' });
            } else {
                let htmlSucesso = `<div class="card-panel green lighten-5"><b class="green-text text-darken-4">✅ Processado com AJAX!</b><br>`;
                if (res.nvts_bloqueados.length > 0) {
                    htmlSucesso += `<p class="red-text"><b>🚫 BLOQUEIOS:</b> ${res.nvts_bloqueados.join(', ')}</p>`;
                }
                htmlSucesso += `<p class="grey-text"><b>📦 SUCESSOS:</b> ${res.nvts_sucesso.join(', ')}</p></div>`;

                $painel.html(htmlSucesso);
                $('tbody').html(res.tabela_atualizada);
                gerenciarGrafico(res.dados_grafico);

                $('#formulario-auditoria')[0].reset();
                $('select').formSelect();
                M.toast({ html: 'Registrado com sucesso!', classes: 'green' });
            }
        },
        error: function () {
            estaEnviando = false;
            $btn.prop('disabled', false).text(textoOriginal);
            M.toast({ html: 'Erro na requisição AJAX', classes: 'red' });
        }
    });
});

$('#btn-consultar').on('click', function () {
    const id = $('#aluno_id').val();
    if (!id) return M.toast({ html: 'Selecione um aluno', classes: 'blue' });

    $.ajax({
        url: 'process.php',
        type: 'POST',
        data: { acao: 'consultar', aluno_id: id },
        dataType: 'json',
        success: function (res) {
            $('tbody').html(res.tabela_html);
            if (res.dados_grafico) gerenciarGrafico(res.dados_grafico);
            M.toast({ html: 'Dados carregados via AJAX.', classes: 'blue' });
        }
    });
});

function resolverNvtUnico(idRegistro, valorNvt) {
    if (!confirm(`Deseja resolver o NVT ${valorNvt}?`)) return;

    $.ajax({
        url: 'resolve_single.php',
        type: 'POST',
        data: { id: idRegistro, nvt: valorNvt },
        dataType: 'json',
        success: function (res) {
            if (res.sucesso) {
                M.toast({ html: `NVT ${valorNvt} resolvido!`, classes: 'green' });
                $('#btn-consultar').trigger('click');
            }
        }
    });
}