<?php

// MYSQL

// Terminal OS:
// $ mysql -uroot [ENTER]
/*
mysql> select now();
+---------------------+
| now()               |
+---------------------+
| 2023-04-09 22:06:14 |
+---------------------+
1 row in set (0,00 sec)

mysql> select now(), database();
+---------------------+------------+
| now()               | database() |
+---------------------+------------+
| 2023-04-09 22:07:36 | NULL       |
+---------------------+------------+
1 row in set (0,00 sec)

mysql> use specialist_oop_eshop;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed

mysql> select now(), database();
+---------------------+----------------------+
| now()               | database()           |
+---------------------+----------------------+
| 2023-04-09 22:09:55 | specialist_oop_eshop |
+---------------------+----------------------+
1 row in set (0,00 sec)


*/

// Documentation
// https://www.php.net/manual/fr/book.mysqli.php


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

const DB_HOST = 'localhost';
const DB_USER = 'brown'; // root
const DB_PASS = 'secret123456'; // ?
const DB_NAME = 'specialist_oop_eshop';


try {

    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

} catch (Exception $e) {

    echo "<h4>Сервер перегружен обратитесь позднее</h4>";
    die($e->getMessage());
}


/*
if ($mysqli->connect_error) {
    echo "Сервер перегружен обратитесь позднее"; die;
    //die("Сервер перегружен обратитесь позднее");
}
*/


echo "<pre>", var_dump($connection), "</pre>";


/*
$connection->query("DROP TABLE IF EXISTS test");
$connection->query("CREATE TABLE test(id INT)");
*/


// mysqli_result() : Statement
$result = $connection->query("SELECT id, title FROM catalog WHERE id = 1");

echo "<pre>", var_dump($result), "</pre>";



// INSERT Вставка
// $connection->query('INSERT INTO catalog(title, author) VALUES("HELLO MYSQL", "NoName")');

/*
mysql> select * from catalog;
+----+-------------+--------+---------+-------+
| id | title       | author | pubyear | price |
+----+-------------+--------+---------+-------+
|  1 | Hello MySQL | NoName |    NULL |  1000 |
+----+-------------+--------+---------+-------+
1 row in set (0,00 sec)

mysql> insert into catalog(title, author) values("HELLO MySQLi", "SomeAuthor");
Query OK, 1 row affected (0,04 sec)

mysql> select * from catalog;
+----+--------------+------------+---------+-------+
| id | title        | author     | pubyear | price |
+----+--------------+------------+---------+-------+
|  1 | Hello MySQL  | NoName     |    NULL |  1000 |
|  3 | HELLO MySQLi | SomeAuthor |    NULL |  NULL |
+----+--------------+------------+---------+-------+
2 rows in set (0,00 sec)

*/

