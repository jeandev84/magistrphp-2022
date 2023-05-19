<?php

/**
 * Хранилище процедуры
 */
try {

    # Соединение к sqlite
    $connection  = new PDO('mysql:dbname=mysql;host=localhost;', 'root', 'secret123456!');


    /**
     * Создание процедура в MYSQL
     *
     * delimiter |
     * DROP PROCEDURE IF EXISTS sp_proc;
     * CREATE PROCEDURE IF EXISTS sp_proc(OUT param1 INT);
     * BEGIN
     *  SELECT 1000 INTO param1;
     *
     * END|
     * delimiter;
     *
     * Вызов функции
     * CALL sp_proc(@result);
     * SELECT @result;
     */

    # https://www.php.net/manual/ru/pdostatement.bindparam.php
    $result = 'result';
    $statement = $connection->prepare('CALL sp_proc(:result)');
    $statement->bindParam('result', $result, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 12);
    $statement->execute();

    echo "Результат: $result\n";

} catch (PDOException $e) {

    exit($e->getMessage());
}