<?php
    $host = 'localhost';
    $dbName = 'test';
    $userName = 'root';
    $password = '';
    $charSet = 'utf8';
    $dsn = "mysql:host=$host;dbname=$dbName;charset=$charSet";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    $connect = new PDO($dsn, $userName, $password, $options);
?>