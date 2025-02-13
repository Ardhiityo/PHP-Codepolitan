<?php

function connection(): PDO
{
    $user = 'root';
    $password = '';
    $dsn = 'mysql:dbname=kepegawaian;host=127.0.0.1';

    $pdo = new PDO($dsn, $user, $password);

    return $pdo;
}
