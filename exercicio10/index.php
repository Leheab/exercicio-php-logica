<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno Online</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="titulo">
        <img src="css/logo.png" alt="Logo" class="logo">
        <h1>Cadastrar Nota do Aluno</h1>
    </div>

    <form id="formNota">
        <div  class="campo">
            <label for="nomeAluno">Nome do Aluno:</label>
            <input type="text" id="nomeAluno" required>
        </div>

        <div class="campo">
            <label for="nomeDisciplina">Disciplina:</label>
            <input type="text" id="nomeDisciplina" required>
        </div>

        <div class="campo">
            <label for="notaAluno">Nota:</label>
            <input type="number" id="notaAluno" min="0" max="10" step="0.1" required>
        </div>

        <div class="campo">
            <input type="submit" value="Registrar" class="botao">
        </div>
    </form>

    <div class="resultado"></div>

</body>
</html>
