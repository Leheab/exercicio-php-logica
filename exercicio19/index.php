<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novos Titans | Gestão de Vendas Brasil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="topo">
        <div class="container">
            <div class="flex-topo">
                <img src="https://yt3.ggpht.com/WVkRtPPNnUvKfL7E_TYyXSzROw9_Z2Nxttf6WIeI5vngaG5UDpWEyBPj5BnakyfMEGDyIbou=s176-c-k-c0x00ffffff-no-rj-mo"
                    alt="Logo Titans" class="logo-pequena">

                <div class="logo-texto">
                    <span class="nome-ong">NOVOS TITANS</span>
                    <span class="barra">|</span>
                    <span class="nome-modulo">RESULTADOS BRASIL</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="container">

        <div class="cartao glass margem-topo">
            <h5 class="azul-texto">Vendas de Consultoria e Formação</h5>
            <p>Registre os valores em reais (R$) vendidos em cada estado e especialidade técnica.</p>

            <form id="formulario-vendas">
                <div class="tabela-rolagem">
                    <table class="tabela-simples centered">
                        <thead>
                            <tr>
                                <th>Estado \ Área Tech</th>
                                <th>Formação Web</th>
                                <th>Consultoria Cloud</th>
                                <th>Treinamento Mobile</th>
                                <th>Análise de Dados</th>
                                <th>DevOps Corporativo</th>
                            </tr>
                        </thead>

                        <tbody id="corpo-tabela-entrada"></tbody>
                    </table>
                </div>

                <div class="centro" style="margin-top: 30px;">
                    <button type="submit" class="botao-azul waves-effect waves-light btn-large">
                        Salvar e Analisar <i class="material-icons right">analytics</i>
                    </button>
                </div>
            </form>
        </div>

        <div id="painel-resultado" class="cartao glass" style="display: none;">
            <h5 class="azul-texto centro">Desempenho Regional </h5>
            <p class="centro">Os campos destacados indicam a especialidade principal de cada estado.</p>

            <div id="exibicao-resultado"></div>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/scripts.js"></script>

</body>

</html>