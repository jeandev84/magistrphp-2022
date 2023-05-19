<?php


// https://www.php.net/manual/fr/ref.strings.php
// https://www.php.net/manual/fr/function.substr

// /home/yao/Desktop/magistrphp2022/first.site/index.php
$filename = __FILE__;

// ишем порядку номера после последнего слэша в имени файла
$position = strripos($filename, DIRECTORY_SEPARATOR);

// Вырезамем строку относительно порядки номера
$page = substr($filename, $position + 1);


switch ($page) {
    case 'index.php': $title = 'Главная'; break;
    case 'basket.php': $title = 'Корзина'; break;
    case 'contacts.php': $title = 'Контакты'; break;
    case 'delivery.php': $title = 'Доставка'; break;
    case 'login.php': $title = 'Вход'; break;
}

?>