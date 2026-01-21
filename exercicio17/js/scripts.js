document.getElementById('formulario-temperatura').addEventListener('submit', function (e) {
    e.preventDefault();

    const inputs = document.querySelectorAll('.input-temperatura');
    const temperaturas = Array.from(inputs).map(input => parseFloat(input.value));

        $('.input-temperatura').each(function () {
            formData.append('temperaturas[]', $(this).val());
        });

        $.ajax({
            url: 'processar.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (dados) {
                exibirResultados(dados);
            },
            error: function () {
                M.toast({
                    html: 'Erro ao processar informações',
                    classes: 'red'
                });
            }
        });
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
}
