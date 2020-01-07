<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=myblog', 'myblog_user', '123456');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    // echo $e->getMessage();
    echo 'DB connection error';
}
