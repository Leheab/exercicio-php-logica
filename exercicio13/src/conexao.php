<?php
error_reporting(0);

$dbHost = 'db';
$dbUser = 'user';
$dbPassword = 'password';
$dbName = 'novos_titans_dados';

$conexao = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if (!$conexao) {
    die("Erro ao conectar ao banco.");
}

mysqli_set_charset($conexao, "utf8mb4");

?>