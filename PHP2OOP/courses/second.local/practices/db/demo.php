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


//
//$sql = "INSERT INTO catalog(title, author) VALUES (?, ?)";
//$stmt = $connection->prepare($sql);
//
//$title  = 'PHP in 24 hours';
//$author = 'NoName';
//
//// is: integer|string
//// первый параметр будет integer
//// первый параметр будет string
//
//// ss: string|string
//$stmt->bind_param('ss', $title, $author);
//$stmt->execute();


/*
// https://www.php.net/manual/fr/mysqli-stmt.fetch.php
// Выборка данных
// Вывод с подготовленным запросом

$author = 'NoName';
$selectStmt = $connection->prepare("SELECT id, title FROM catalog WHERE author = ?");
$selectStmt->bind_param('s', $author);



// Установливаем значения которые мы должный получить
// Bind multiple params
$selectStmt = $connection->prepare("SELECT id, title FROM catalog");
$selectStmt->bind_result($id, $title);
$selectStmt->execute();


echo "<table border=1>";
while ($selectStmt->fetch()) {
   echo "<tr>";
   echo "<td>", $id, "</td>";
   echo "<td>", $title, "</td>";
}
echo "</table>";
*/





/*
Создать функции, для выборки, обновления, удаления и вставки данных и таблицы catalog и orders
// select(): Выборка данных
// insert(): Вставка данных
// update(): Обновление данных
// delete(): Удаление данных
*/

/*
mysql> show tables;
+--------------------------------+
| Tables_in_specialist_oop_eshop |
+--------------------------------+
| catalog                        |
| orders                         |
+--------------------------------+
2 rows in set (0,06 sec)
*/

// Подключение к БД
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

/*
function func() {
    global $mysqli;
}
*/

// CATALOG
/**
 * @param mysqli $mysqli
 * @param string $title
 * @return array
*/
function selectCatalog(mysqli $mysqli, string $title) {

    $sql = "select id, title, author, pubyear, price from catalog where title LIKE ?";

    $title = "%$title%";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $title);
    $stmt->bind_result($id, $title, $author, $pubyear, $price);
    $stmt->execute();

    $result = [];

    while ($stmt->fetch()) {
        $result[] = [
            'id' => $id,
            'title' => $title,
            'author' => $author,
            'pubyear' => $pubyear,
            'price'  => $price
        ];
    }

    // array_pop(): Удаляет последный элемент массива
    // return array_pop($result);

    return $result;
}


/**
 * @param mysqli $mysqli
 * @param string $title
 * @param string $author
 * @param int $pubyear
 * @param int $price
 * @return void
*/
function insertCatalog(mysqli $mysqli, string $title, string $author, int $pubyear, int $price)
{
    $sql = "insert into catalog(title, author, pubyear, price)  values(?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param('ssii', $title, $author, $pubyear, $price);
    $stmt->execute();
}



/**
 * @param mysqli $mysqli
 * @param int $id
 * @param int  $price
 * @return void
*/
function updateCatalog(mysqli $mysqli, int $id, int $price) {
    $sql = "update catalog set price = {$price} where id = {$id}";
    $mysqli->query($sql);
}


/**
 * @param mysqli $mysqli
 * @param int $id
 * @return void
*/
function deleteCatalog(mysqli $mysqli, int $id)
{
    $sql = "delete from catalog where id = {$id}";
    $mysqli->query($sql);
}



// insertCatalog($mysqli, 'PHP9', 'NoName2', 2022, 1000);
deleteCatalog($mysqli, 7);
updateCatalog($mysqli, 6, 2222);
$result = selectCatalog($mysqli, 'PHP');
dump($result);


// ORDERS
function selectOrders(mysqli $mysqli) {

}



function insertOrders(mysqli $mysqli) {

}


function updateOrders(mysqli $mysqli) {

}


function deleteOrders(mysqli $mysqli) {

}




// 1. ORM (Object Relation Mapping) - Отображение класса в базу и иногда наоборот

// Example: Doctrine ( DBAL ) - Database Abstraction Layer
// Допольнительный абстрактции
// DBAL: Example (DBAL\SQLQueryBuilder)

// 2. Шаблоны в проектировании баз данных
// например ( вложные меню, дерево, категории )
// Иерархические структуры в SQL
// https://stackoverflow.com/questions/4048151/what-are-the-options-for-storing-hierarchical-data-in-a-relational-database
/*
+-------------+----------------------+--------+-----+-----+
| category_id | name                 | parent | lft | rgt |
+-------------+----------------------+--------+-----+-----+
|           1 | ELECTRONICS          |   NULL |   1 |  20 |
|           2 | TELEVISIONS          |      1 |   2 |   9 |
|           3 | TUBE                 |      2 |   3 |   4 |
|           4 | LCD                  |      2 |   5 |   6 |
|           5 | PLASMA               |      2 |   7 |   8 |
|           6 | PORTABLE ELECTRONICS |      1 |  10 |  19 |
|           7 | MP3 PLAYERS          |      6 |  11 |  14 |
|           8 | FLASH                |      7 |  12 |  13 |
|           9 | CD PLAYERS           |      6 |  15 |  16 |
|          10 | 2 WAY RADIOS         |      6 |  17 |  18 |
+-------------+----------------------+--------+-----+-----+

CREATE TABLE `taxons` (
  `TaxonId` smallint(6) NOT NULL default '0',
  `ClassId` smallint(6) default NULL,
  `OrderId` smallint(6) default NULL,
  `FamilyId` smallint(6) default NULL,
  `GenusId` smallint(6) default NULL,
  `Name` varchar(150) NOT NULL default ''
);

+---------+---------+---------+----------+---------+-------------------------------+
| TaxonId | ClassId | OrderId | FamilyId | GenusId | Name                          |
+---------+---------+---------+----------+---------+-------------------------------+
|     254 |       0 |       0 |        0 |       0 | Aves                          |
|     255 |     254 |       0 |        0 |       0 | Gaviiformes                   |
|     256 |     254 |     255 |        0 |       0 | Gaviidae                      |
|     257 |     254 |     255 |      256 |       0 | Gavia                         |
|     258 |     254 |     255 |      256 |     257 | Gavia stellata                |
|     259 |     254 |     255 |      256 |     257 | Gavia arctica                 |
|     260 |     254 |     255 |      256 |     257 | Gavia immer                   |
|     261 |     254 |     255 |      256 |     257 | Gavia adamsii                 |
|     262 |     254 |       0 |        0 |       0 | Podicipediformes              |
|     263 |     254 |     262 |        0 |       0 | Podicipedidae                 |
|     264 |     254 |     262 |      263 |       0 | Tachybaptus                   |
____________________________________________________________________________________





*/
