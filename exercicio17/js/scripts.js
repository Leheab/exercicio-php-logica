document.getElementById('formulario-temperatura').addEventListener('submit', function (e) {
    e.preventDefault();

    const inputs = document.querySelectorAll('.input-temperatura');
    const temperaturas = Array.from(inputs).map(input => parseFloat(input.value));

    const formData = new FormData();
    temperaturas.forEach(temp => formData.append('temperaturas[]', temp));

    fetch('processar.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json()) // O PHP vai devolver os cálculos prontos
        .then(dados => {
            atualizarInterface(dados);
        })
        .catch(error => {
            console.error('Erro ao processar:', error);
            alert('Erro ao enviar dados para o servidor.');
        });
});

function atualizarInterface(dados) {
    document.getElementById('corpo-tabela-resultado').innerHTML = `
            <td class="valor-destaque">${dados.media}°C</td>
            <td class="valor-destaque red-text text-darken-2">${dados.maxima}°C</td>
            <td class="valor-destaque blue-text text-darken-2">${dados.minima}°C</td>
            <td class="valor-destaque">${dados.percentual}%</td>
        </tr>
    `;

    const painel = document.getElementById('painel-resultados');
    painel.style.display = 'block';

    painel.scrollIntoView({ behavior: 'smooth' });
});
