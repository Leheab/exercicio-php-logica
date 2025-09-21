<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu céu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="Gerador-DE-ESTRELAs-20-09-2025.gif" alt="Gerador de Estrelas" class="titulo-gif">
    <h2>Digite um número para ver as estrelas se organizarem em linhas: Cada linha terá tantas estrelas quanto seu número, assim você consegue contar e acompanhar a quantidade visualmente</h2>
    
    <form method="post" action="">
        <div>
            <label for="estrela"><h2>Quantas estrelas você quer desenhar?</h2></label>
            <input type="number" name="estrela" id="estrela" required>
        </div>
        <input type="submit" value="Gerar Padrão">
    </form>

    <div id="resultado"></div>

</body>
</html>