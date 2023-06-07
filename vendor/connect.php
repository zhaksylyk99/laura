<?php

    $connect = mysqli_connect('localhost', 'root', 'root', 'blog_samples');

    if (!$connect) {
        die('Error connect to DataBase');
    }

    $user = "root";
    $password = "root";
    $host = "localhost";
    $db = "blog_samples";
    $dbh = 'mysql:host='.$host.';dbname='.$db.';charset=utf8';
    $pdo = new PDO($dbh, $user, $password);