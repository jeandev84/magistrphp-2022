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
    /*
    $queries = [
        "INSERT INTO user VALUES ('Vasya', 'localhost')",
        "INSERT INTO user VALUES ('Petya', 'localhost')",
    ];

    foreach ($queries as $sql) {
        $connection->exec($sql);
    }
    */

    $sql  = 'SELECT user, host FROM user'; // WHERE host = :host';
    $host = 'localhost';

    //$statement = $connection->prepare($sql);

    //$statement->bindParam(':host', $host, PDO::PARAM_STR);
    //$statement->execute();
    $statement = $connection->query($sql);
    print_r($statement->fetchAll(PDO::FETCH_ASSOC));

} catch (PDOException $e) {

    exit($e->getMessage());
}