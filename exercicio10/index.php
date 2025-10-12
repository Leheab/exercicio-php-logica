<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Aluno Online</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>            
</head>
<body>

    <div class="titulo">
        <img src="css/logo.png" alt="Logo" class="logo">
        <h1>Cadastrar Nota do Aluno</h1>
    </div>

    <form id="formNota">
      <div class="row">
        <div class="col s12">
          <div class="row">
            <div class="input-field col s12">
              <input type="text" id="nomeAluno" required>
              <label for="nomeAluno">Nome do Aluno</label>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12">
          <div class="row">
            <div class="input-field col s12">
              <input type="text" id="nomeDisciplina" required>
              <label for="nomeDisciplina">Disciplina</label>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12">
          <div class="row">
            <div class="input-field col s12">
              <input type="number" id="notaAluno" min="0" max="10" step="0.1" required>
              <label for="notaAluno">Nota</label>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12 center-align">
          <input type="submit" value="Registrar" class="botao waves-effect waves-light">
        </div>
      </div>
    </form>

</body>
</html>