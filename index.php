<?php

require_once 'db_connect.php';

$sql = 'select id, title, description, image from posts';
$data = $pdo->query($sql);
$posts = $data->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>My Blog</title>
</head>
<body>
    <div class="container">

        <h1>Posts</h1>
        <p><a class="btn btn-success" href="/create.php">Create post</a></p>
        <table class="table">
            <?php foreach ($posts as $post) : ?>
            <tr>
                <td><?=$post['title']?></td>
                <td><?=$post['description']?></td>
                <td>
                    <?php if (!empty($post['image']) && file_exists('images/' . $post['image'])) : ?>
                    <img height="50" src="images/<?=$post['image']?>" alt="Image">
                    <?php endif ?>
                </td>
                <td>
                    <a class="btn btn-primary" href="/details.php?id=<?=$post['id']?>">View</a>
                    <a class="btn btn-primary" href="/edit.php?id=<?=$post['id']?>">Edit</a>
                    <a class="btn btn-danger" href="/delete.php?id=<?=$post['id']?>">Delete</a>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>
