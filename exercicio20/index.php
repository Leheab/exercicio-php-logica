<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gincana Verde | Registro de Coleta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <nav class="nav-transparente">
            <div class="container">
                <div class="nav-wrapper">
                    <span class="brand-logo green-text text-darken-2">
                        <i class="material-icons">recycling</i> Gincana Verde
                    </span>
                </div>
            </div>
        </nav>
    </header>

    <main class="container">
        <div class="cartao-principal glass">
            <div class="texto-introducao">
                <h4 class="verde-texto">Registro de Pontuação</h4>
                <p>Insira abaixo a quantidade de materiais coletados pelas turmas em cada rodada.</p>
            </div>

            <form id="form-pontos">
                <div class="tabela-rolagem">
                    <table class="centered tabela-cadastro">
                        <thead>
                            <tr id="cabecalho-jogadores">
                            </tr>
                        </thead>
                        <tbody id="corpo-matriz">
                        </tbody>
                    </table>
                </div>

                <div class="center-align" style="margin-top: 40px;">
                    <button type="submit" class="btn-eco waves-effect waves-light btn-large">
                        Enviar para Análise <i class="material-icons right">analytics</i>
                    </button>
                </div>
            </form>
        </div>

        <div id="sessao-resultados" style="display: none;">
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>s