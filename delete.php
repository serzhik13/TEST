<?php

require_once 'db_connect.php';
require_once 'lib.php';

if (isset($_POST['confirm'])) {
    deletePost($_POST['id'], $pdo);
    header('Location: index.php');
}

try {
    $post = getPost($_GET['id'], $pdo);
} catch (Exception $e) {
    header('Location: index.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Delete</title>
</head>
<body>
    <div class="container">
        <h1>Are you sure?</h1>
        <p>Delete post "<?=$post['title']?>"?</p>
        <form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?=$post['id']?>">
            <input type="hidden" name="confirm" value="1">
            <a href="/index.php" class="btn btn-success">No</a>
            <button class="btn btn-danger">Yes</button>
        </form>
    </div>
</body>
</html>
