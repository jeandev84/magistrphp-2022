<?php

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

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

const DB_HOST = 'localhost';
const DB_USER = 'brown'; // root
const DB_PASS = 'secret123456'; // ?
const DB_NAME = 'specialist_oop_eshop';

$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
