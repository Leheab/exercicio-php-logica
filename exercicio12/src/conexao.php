<?php

$dbHost = 'db';
$dbUser = 'user';
$dbPassword = 'password';
$dbName = 'novos_titans_dados';

$conexao = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if (!$conexao) {
    die("Erro: " . mysqli_connect_error());
}
