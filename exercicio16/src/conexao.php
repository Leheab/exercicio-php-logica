<?php
$dbHost = 'db';
$dbUser = 'user';
$dbPassword = 'password';
$dbName = 'novos_titans_dados';

$conexao = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if (!$conexao) {
    die("Database connection failed: " . mysqli_connect_error());
}
