<?php

// Автозагрузка классов
require_once __DIR__ . '/autoload.php';


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

function dump($result) {
    echo "<pre>", var_dump($result), "</pre>";
}

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


//dump($connection);


// mysqli_result() : Statement
// $result = $connection->query("SELECT id, title FROM catalog WHERE id = 1");
// dump($result);



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


/*
// SQL Injection
// ТО ЧТО НЕ НИКОГДА НЕ НАДО ДОПУСТИТЬ КОГДА ВЫПОЛНЯЕМ SQL запрос
// SELECT id, title FROM catalog WHERE id = 1
$id = 1;
$result = $connection->query("SELECT id, title FROM catalog WHERE id = $id");


// SELECT id, title FROM catalog WHERE id = 1 UNION SELECT adminname, password FROM users;
$id = '1 UNION SELECT adminname, password FROM users';
$id = (int) '1 UNION SELECT adminname, password FROM users';
$result = $connection->query("SELECT id, title FROM catalog WHERE id = $id");

dump($result);
*/


// Вставки данных с подготовленным запросом
// mysqli_stmt()
// $stmt = $connection->prepare("INSERT INTO catalog(title, author) VALUES ('PHP in 24 hours', 'NoName')");
// mysqli_stmt()
// dump($stmt);



$sql = "INSERT INTO catalog(title, author) VALUES (?, ?)";
$stmt = $connection->prepare($sql);

$title  = 'PHP in 24 hours';
$author = 'NoName';

// is: integer|string
// первый параметр будет integer
// первый параметр будет string

// ss: string|string
$stmt->bind_param('ss', $title, $author);
$stmt->execute();


// https://www.php.net/manual/fr/mysqli-stmt.fetch.php
// Выборка данных
$selectStmt = $connection->prepare("SELECT id, title FROM catalog");

$author = 'NoName';
$selectStmt = $connection->prepare("SELECT id, title FROM catalog WHERE author = ?");
$selectStmt->bind_param('s', $author);



// Установливаем значения которые мы должный получить
// Bind multiple params
$selectStmt->bind_result($id, $title);
$selectStmt->execute();


echo "<table border=1>";
while ($selectStmt->fetch()) {
    echo "<tr>";
    echo "<td>", $id, "</td>";
    echo "<td>", $title, "</td>";
}
echo "</table>";
