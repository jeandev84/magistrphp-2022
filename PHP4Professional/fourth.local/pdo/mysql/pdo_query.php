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


try {

    $connection  = new PDO('mysql:host=localhost;', 'root', 'secret123456!');

    # $mysql->exec('DROP DATABASE IF EXISTS demo');
    if(! $connection->exec('CREATE DATABASE IF NOT EXISTS demo')) {
        exit("что-то пошло не так при создании базы 'demo'\n");
    } else {
        print "База 'demo' успешно создана\n";
    }

    # Выбираем базу с которой мы хотим работать, мы переключаем к базу 'demo'
    $connection  = new PDO('mysql:dbname=demo;host=localhost;', 'root', 'secret123456!');


    # Выполняем запрос
    $connection  = new PDO('mysql:dbname=mysql;host=localhost;', 'root', 'secret123456!');
    $sql = 'SELECT user, host FROM user';
    # print_r($mysql->query($sql));

    foreach ($connection->query($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) {
        print_r($row);
    }

} catch (PDOException $e) {

    exit($e->getMessage());
}