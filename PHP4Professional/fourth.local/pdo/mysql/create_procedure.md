$ sudo mysql -uroot -psecret123456!
[sudo] password for yao:
mysql: [Warning] Using a password on the command line interface can be insecure.
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 36
Server version: 8.0.32-0ubuntu0.22.04.2 (Ubuntu)

Copyright (c) 2000, 2023, Oracle and/or its affiliates.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> SELECT database();
+------------+
| database() |
+------------+
| NULL       |
+------------+
1 row in set (0,00 sec)

mysql> use mysql;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> SELECT database();
+------------+
| database() |
+------------+
| mysql      |
+------------+
1 row in set (0,00 sec)

mysql> delimiter |
mysql>             DROP PROCEDURE IF EXISTS sp_proc;
->             CREATE PROCEDURE sp_proc(OUT param1 INT)
->             BEGIN
->                 SELECT 1000 INTO param1;
->             END|
Query OK, 0 rows affected, 1 warning (0,01 sec)

Query OK, 0 rows affected (0,02 sec)

mysql>             delimiter ;
mysql> CALL sp_proc(@result);
Query OK, 1 row affected (0,04 sec)

mysql> SELECT @result;
+---------+
| @result |
+---------+
|    1000 |
+---------+
1 row in set (0,01 sec)

mysql> 