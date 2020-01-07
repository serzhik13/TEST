<?php

require_once 'db_connect.php';
require_once 'lib.php';

try {
    $post = getPost($_GET['id'], $pdo);
} catch (Exception $e) {
    $error = $e->getMessage();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$post['title']?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php if (isset($error)) : ?>
            <h1>Oooops...</h1>
            <div class="alert alert-danger"><?=$error?></div>
        <?php else : ?>
            <h1><?=$post['title']?></h1>
            <p><i><?=date('H:i, d.m.Y', strtotime($post['createdAt']))?></i></p>
            <p><?=$post['content']?></p>
            <p><a class="btn btn-primary" href="/index.php">Back</a></p>
        <?php endif ?>
    </div>
</body>
</html>
