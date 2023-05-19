<?php

# https://www.php.net/manual/ru/class.pdo
# $sqlite = new PDO('sqlite:test.db');

function dump($data) {

    if (php_sapi_name() !== 'cli') {
        echo "<pre>";
    }

    var_dump($data);

    if (php_sapi_name() !== 'cli') {
        echo "</pre>";
    }
}

/**
 * $connection = new PDO('sqlite:data/mydb.sq3');
*/

# const DB_NAME = 'data/test.db';
const DB_NAME   = 'data/mydb.sq3';


class User
{
     public $user;
     public $host;
}

try {

    # Соединение к sqlite
    $connection = new PDO('sqlite:'. DB_NAME);


    # Создание базы
    if (! filesize(DB_NAME)) {
        $connection->exec('CREATE TABLE user (user TEXT, host TEXT)');
    }

    # Заполняем данные в таблицу user
    $queries = [
        "INSERT INTO user VALUES ('Vasya', 'localhost')",
        "INSERT INTO user VALUES ('Petya', 'localhost')",
    ];

    foreach ($queries as $sql) {
        $connection->exec($sql);
    }


    # Выполняем запрос
    $sql = 'SELECT user, host FROM user';
    foreach ($connection->query($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) {
        print_r($row);
    }

    $stmt = $connection->query($sql);
//    print_r($stmt->fetchAll(PDO::FETCH_BOTH));
//    print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
//    print_r($stmt->fetchAll(PDO::FETCH_NUM));
//    print_r($stmt->fetchAll(PDO::FETCH_OBJ));
//    print_r($stmt->fetchAll(PDO::FETCH_COLUMN));
    //print_r($stmt->fetchAll(PDO::FETCH_CLASS, User::class));
    print_r($stmt->fetchObject(User::class));

} catch (PDOException $e) {

    exit($e->getMessage());
}