<?php
require_once __DIR__ . "/src/score_processor.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sucesso = salvarNoBanco($_POST);

    if ($sucesso) {
        $dados = $_POST['ponto'];

        echo "<h4 class='verde-texto center-align'>Análise Concluída</h4>";

        echo gerarTabela($dados, "1. Tabela Completa", "todos");
        echo gerarTabela($dados, "2. Apenas Pontuações Ímpares", "impares");
        echo gerarTabela($dados, "3. Apenas Pontuações Pares", "pares");
    } else {
        echo "<p class='red-text'>Erro ao conectar com o banco de dados.</p>";
    }
}
