<?php

function getPost($id, PDO $pdo) {

    $sql = 'select * from posts where id = :id';
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();

    if ($query->rowCount() === 0) {
        throw new Exception('Post not found');
    }

    return $query->fetch(PDO::FETCH_ASSOC);
}

function deletePost($id, PDO $pdo) {
    $sql = 'delete from posts where id = :id';

    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id);
    return $query->execute();
}

function getRandomString($length) {
    $symbols = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
    $result = '';

    for ($i = 0; $i < $length; $i++) {
        $result .= $symbols[rand(0, count($symbols) - 1)];
    }

    return $result;
}