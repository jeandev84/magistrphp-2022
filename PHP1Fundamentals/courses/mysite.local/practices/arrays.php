<?php

// Константы
const AUTHOR  = 'Жан-Клод';
const YEAR    = '2023';
const DBHOST  = 'localhost';
const DBLOGIN = 'root';
const DBPASS  = 'secret123!';
const DBNAME  = 'specialist__shop_books';


// Строковые переменные
$firstName = 'Яо';
$lastName  = 'Куасси';
$email     = 'jeanyao@ymail.com';
$address   = 'г.Курган, улица Станционная, дом 68 кв 57';
$successOrder = &$firstName;

// Массив
$categories = [
    'Компьютерная',
    'Психология',
    'История',
    'Эротика',
    'Поэзия',
    'Ужасы',
];

$publishers = ['Эксмо', 'Лиитрес']; // массив издательства
echo $publishers[0];

$books = [
    [
        'idbook' => 1,
        'title'  => 'Война и Мир',
        'price'  => 1500
    ],
    [
        'idbook' => 2,
        'title'  => 'Программирование на пхп',
        'price'  => 3700
    ]
];


$menu = [
    ['title' => 'Доставка', 'url' => 'delivery.html'],
    ['title' => 'Доставка самовывоз', 'url' => 'deliverySelf.html'],
];

?>