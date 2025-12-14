<?php

$dbHost = 'db';
$dbUser = 'user';
$dbPassword = 'password';
$dbName = 'novos_titans_dados';

$conexao = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

try {
    $conexao = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
    $conexao->set_charset("utf8mb4");
} catch (Exception $e) {
    die("Erro interno ao conectar ao banco de dados.");
}
