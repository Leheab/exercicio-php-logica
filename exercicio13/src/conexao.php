<?php

$dbHost = 'db';
$dbUser = 'user';
$dbPassword = 'password';
$dbName = 'novos_titans_dados';

$conexao = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if (!$conexao) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}
