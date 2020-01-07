<?php
    session_start();

    require_once 'lib.php';

    if (isset($_POST['title'])) {

        if ($_POST['csrf'] !== $_SESSION['csrf']) {
            echo 'CSRF invalid';
            die;
        }

        $image = $_FILES['image'];

        $info = pathinfo($image['name']);

//        move_uploaded_file($image['tmp_name'], 'images/' . $image['name']);

        $filename = time() . '.' . $info['extension'];
        move_uploaded_file($image['tmp_name'], 'images/' . $filename);

        require_once 'db_connect.php';

        $sql = 'insert into posts set title = :title, description = :description, content = :content, image = :image';

        $query = $pdo->prepare($sql);

        $query->bindValue(':title', $_POST['title']);
        $query->bindValue(':description', $_POST['description']);
        $query->bindValue(':content', $_POST['content']);
        $query->bindValue(':image', $filename);

        if ($query->execute()) {
            header('Location: index.php');
        }
    } else {
        $_SESSION['csrf'] = getRandomString(25);
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
    <title>Create post</title>
</head>
<body>
    <div class="container">
        <h1>Create post</h1>
        <?php include 'form.php' ?>
    </div>
</body>
</html>
