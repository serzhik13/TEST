<?php

require_once 'db_connect.php';

$sql = '
    create table if not exists posts (
        id int auto_increment,
        title varchar(200) not null,
        description varchar(500),
        content text not null,
        createdAt datetime default CURRENT_TIMESTAMP,
        primary key (id)
    );
';

$pdo->exec($sql);

$sql = '
    insert into posts set
        title = "Test post 1",
        description = "Test description of post 1",
        content = "Lorem ipsum dolor sit amet"
';

$pdo->exec($sql);

$sql = '
    insert into posts set
        title = "Test post 2",
        description = "Test description of post 2",
        content = "Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue"
';

$pdo->exec($sql);

echo 'Success';
