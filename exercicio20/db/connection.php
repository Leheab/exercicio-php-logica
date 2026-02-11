<?php
$host_do_banco = 'db';
$usuario_do_banco = 'user';
$senha_do_banco = 'password';
$nome_do_banco = 'novos_titans_dados';

$conexao = mysqli_connect($host_do_banco, $usuario_do_banco, $senha_do_banco, $nome_do_banco);

if (!$conexao) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}
