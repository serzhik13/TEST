<?php

require_once 'db_connect.php';

$sql = 'alter table posts add column image varchar(300)';

try {
    $pdo->exec($sql);
} catch (PDOException $e) {
    echo 'Migration fail';
    echo "\n";
    die;
}

echo 'Success';
echo "\n";
