document.getElementById('formulario-temperatura').addEventListener('submit', function (e) {
    e.preventDefault();

    const formulario = document.getElementById('formulario-temperatura');
    const dadosFormulario = new FormData(formulario);

    fetch('processar.php', {
        method: 'POST',
        body: dadosFormulario
    })
        .then(response => response.json())
        .then(dados => {
            document.getElementById('corpo-tabela-resultado').innerHTML = `
            <tr>
                <td class="valor-destaque">${dados.media}°C</td>
                <td class="valor-destaque red-text text-darken-2">${dados.maxima}°C</td>
                <td class="valor-destaque blue-text text-darken-2">${dados.minima}°C</td>
                <td class="valor-destaque">${dados.percentual}%</td>
            </tr>
        `;

            const painel = document.getElementById('painel-resultados');
            painel.style.display = 'block';
            painel.scrollIntoView({ behavior: 'smooth' });
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao processar os dados no servidor.');
        });
});