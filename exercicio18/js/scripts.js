document.addEventListener('DOMContentLoaded', function () {
    M.FormSelect.init(document.querySelectorAll('select'));
});

document.getElementById('formulario-auditoria').addEventListener('submit', function (e) {
    e.preventDefault();
    const botao = document.getElementById('btn-analisar');
    const painel = document.getElementById('painel-resultados');

    botao.innerText = "Comparando...";
    botao.classList.add('disabled');

    const dados = new FormData(this);

    fetch('processar.php', {
        method: 'POST',
        body: dados
    })
        .then(resposta => resposta.json())
        .then(resultado => {
            let html = `<h5 class="center-align" style="font-weight:800; margin-bottom:40px;">Relatório de Sincronia</h5>
                    <div class="row">`;

            const criarColuna = (titulo, lista, cor) => {
                let itens = `<div class="col s12 m6">
                            <p class="grey-text uppercase" style="font-size:0.7rem; font-weight:bold;">${titulo}</p>`;

                if (lista.length > 0) {
                    lista.forEach(n => {
                        itens += `<div style="padding:12px; background:#f8fafc; border-left:4px solid ${cor}; margin-bottom:10px;">Card NVT-${n}</div>`;
                    });
                } else {
                    itens += `<p class="grey-text">Tudo sincronizado.</p>`;
                }
                return itens + `</div>`;
            };

            html += criarColuna("Exclusivo do Aluno", resultado.exclusivos_aluno, "#7b2cbf");
            html += criarColuna("Exclusivo do Mentor", resultado.exclusivos_mentor, "#3a86ff");
            html += `</div>`;

            painel.innerHTML = html;
            painel.style.display = 'block';

            window.scrollTo({ top: painel.offsetTop - 50, behavior: 'smooth' });

            botao.innerText = "Comparar Atividades";
            botao.classList.remove('disabled');
        })
        .catch(erro => alert("Erro ao processar dados no servidor."));
});