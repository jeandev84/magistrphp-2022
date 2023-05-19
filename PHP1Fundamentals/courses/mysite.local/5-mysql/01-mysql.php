<?php

// Реляционные базы данных ( MYSQL, POSTGRES, SQLITE, ORACLE ...)
// Язык SQL чтобы взаймодействовать с базой данных

$link = @mysqli_connect('localhost', 'root', '');

if( mysqli_connect_errno() ){
  echo 'Проблема с подключением к серверу: '.mysqli_connect_errno().'<hr />';
} else {
  echo 'К серверу подключились нормально...<hr />';  
}

mysqli_select_db($link, 'mydb');

if( mysqli_errno($link) ){
  echo 'Кажется базы <strong>mydb</strong> нет, создаём...<hr />';
  mysqli_query($link, 'CREATE DATABASE mydb');
  echo 'База создана, выбираем её для работы...<hr />';
  mysqli_select_db($link, 'mydb');
} else {
  echo 'Выбрали базу <strong>mydb</strong>...<hr />';  
}

mysqli_query($link, "CREATE TABLE tb1 (
  col1 INT PRIMARY KEY AUTO_INCREMENT,
  col2 VARCHAR(100) NOT NULL DEFAULT '',
  col3 DECIMAL(5,2),
  col4 DATETIME DEFAULT CURRENT_TIMESTAMP
)");


// Создание таблицы товаров назавём "good"
mysqli_query($link, "CREATE TABLE good (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(100) NOT NULL DEFAULT '',
  price DECIMAL(5,2),
  qty   INT DEFAULT 0
)");

if( mysqli_errno($link) ){
  echo 'Таблица <strong>tb1</strong> существует...<hr />';  
} else {
  echo 'Создаём таблицу <strong>tb1</strong>...<hr />';  
}

$str = uniqid();
mysqli_query($link, "INSERT INTO tb1 VALUES (NULL, 'строка $str ', 234, now())");

if( mysqli_errno($link) ){
  echo 'Проблема со вставкой очередной записи...<hr />';  
} else {
  echo 'Вставляем очередную запись...<hr />'; 
}

mysqli_query($link, "INSERT INTO tb1 VALUES 
  (NULL, 'строка !!! ', 2, now()),
  (NULL, 'строка,??? ', 3, now()),
  (NULL, 'строка @@@ ', 4, now())
  ");

if( mysqli_errno($link) ){
  echo 'Проблема со вставкой нескольких записей...<hr />';  
} else {
  echo 'Вставляем очередные записи...<hr />'; 
}

mysqli_query($link, "UPDATE tb1 SET col3 = col3 + 10");

if( mysqli_errno($link) ){
  echo 'Проблема с обновлением...<hr />';  
} else {
  echo 'Обновляем поле col3 всех записей...<hr />'; 
}

// mysqli_query($link, "DELETE FROM tb1 LIMIT 2");
mysqli_query($link, "DELETE FROM tb1 WHERE col1 = 2");

if( mysqli_errno($link) ){
  echo 'Проблема с удалением...<hr />';  
} else {
  echo 'Удаляем две первых записи...<hr />'; 
}

$result = mysqli_query($link, "SELECT *, UNIX_TIMESTAMP(col4) as t FROM tb1 ORDER BY col1");

if( mysqli_errno($link) ){
  echo 'Проблема с выборкой SELECT :(...<hr />';  
} else {
  echo 'Получили записи...<hr />'; 

  echo '<pre>';
  while($row = mysqli_fetch_array($result)){
    // print_r( $row );
    echo "${row['col1']} - ${row['col2']} - ${row['col3']} - ${row['col4']} - ${row['t']} ";
    echo '<hr/>';
  }
  echo '</pre>';
}

//удаление базы
//mysqli_query($link, "DROP DATABASE mydb");



