document.getElementById('formulario-temperatura').addEventListener('submit', function (e) {
    e.preventDefault();

    const inputs = document.querySelectorAll('.input-temperatura');
    const temperaturas = Array.from(inputs).map(input => parseFloat(input.value));

    const maxima = Math.max(...temperaturas);
    const minima = Math.min(...temperaturas);
    const soma = temperaturas.reduce((a, b) => a + b, 0);
    const media = (soma / temperaturas.length).toFixed(1);

    const diasQuentes = temperaturas.filter(t => t > 30).length;
    const percentual = ((diasQuentes / temperaturas.length) * 100).toFixed(0);

    document.getElementById('corpo-tabela-resultado').innerHTML = `
        <tr>
            <td class="valor-destaque">${media}°C</td>
            <td class="valor-destaque red-text text-darken-2">${maxima}°C</td>
            <td class="valor-destaque blue-text text-darken-2">${minima}°C</td>
            <td class="valor-destaque">${percentual}%</td>
        </tr>
    `;

    const painel = document.getElementById('painel-resultados');
    painel.style.display = 'block';

    painel.scrollIntoView({ behavior: 'smooth' });
});