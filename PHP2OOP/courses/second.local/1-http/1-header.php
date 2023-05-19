<?php

//header("Location: http://www.example.com/"); // Перенаправление браузера
//header("Refresh:0; url=some.php"); // Перезапрос ресурса

//header("Refresh:5; url=header.php?id=123"); // Перезапрос ресурса каждый 5 сек на другой адресс
//print_r($_GET);

//header('Content-Type: application/pdf'); // Установка типа содержимого
//header('Content-Disposition: attachment; filename="downloaded.pdf"'); // Указание на загрузку

/*
Например загрузим HTML файл
header('Content-Disposition: attachment; filename="price.html"');
echo "<h1>Прайс</h1>";

for ($i = 0; $i < 10; $i++) {
    echo "<div>Товар$i: ", 100 * $i,"</div>";
}
*/


// Кеширование
//header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
//header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Дата в прошлом

