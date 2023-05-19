<?php

require_once "config.php";


// Строковые переменные
$firstName = 'Яо';
$lastName  = 'Куасси';
$email     = 'jeanyao@ymail.com';
$address   = 'г.Курган, улица Станционная, дом 68 кв 57';
$successOrder = &$firstName;

// Массив
$categories = [
    'Action',
    'Another action',
    'Something else here',
    'Action',
    'Another action',
    'Something else here',
    'Action',
    'Another action',
    'Something else here'
];

/*
$menu = [
    ['title' => 'Доставка', 'url' => 'delivery.html'],
    ['title' => 'Контакты', 'url' => 'contacts.html'],
    ['title' => 'Войти', 'url' => 'login.html'],
    ['title' => 'Корзина', 'url' => 'basket.html'],
    ['title' => 'Dropdown', 'url' => '#'],
];
*/

$menu = [
    'delivery.php' => 'Доставка',
    'contacts.php' => 'Контакты',
    'login.php'    => 'Войти',
    'basket.php'   => 'Корзина'
];

$publishers = ['Первое', 'Второе', 'Третье']; // издательства

$books = [
    [
        [
            'idbook' => 1,
            'img'    => 'http://placehold.it/150x220',
            'title'  => 'Программирование на java',
            'price'  => 1200,
            'author' => 'Шуйков Сергей',
            'description' => 'This is a wider card with supporting text below as a natural lead-in to additional content.'
        ],
        [
            'idbook' => 2,
            'img'    => 'http://placehold.it/150x220',
            'title'  => 'Основы программирование',
            'price'  => 800,
            'author' => 'Игорь Вячеславович',
            'description'  => 'This card has supporting text below as a natural lead-in to additional content.',
        ],
        [
            'idbook' => 3,
            'img'    => 'http://placehold.it/150x220',
            'title'  => 'Программирование на php',
            'price'  => 2100,
            'author' => 'Шуйков Сергей',
            'description' => 'This is a wider card with supporting text below as a natural lead-in to additional content.'
        ],
    ],
    [
        [
            'idbook' => 4,
            'img'    => 'http://placehold.it/150x220',
            'title'  => 'Программирование на java',
            'price'  => 1200,
            'author' => 'Шуйков Сергей',
            'description' => 'This is a wider card with supporting text below as a natural lead-in to additional content.'
        ],
        [
            'idbook' => 5,
            'img'    => 'http://placehold.it/150x220',
            'title'  => 'Основы программирование',
            'price'  => 800,
            'author' => 'Игорь Вячеславович',
            'description'  => 'This card has supporting text below as a natural lead-in to additional content.',
        ],
        [
            'idbook' => 6,
            'img'    => 'http://placehold.it/150x220',
            'title'  => 'Программирование на php',
            'price'  => 2100,
            'author' => 'Шуйков Сергей',
            'description' => 'This is a wider card with supporting text below as a natural lead-in to additional content.'
        ],
    ]
];


$page = 'index';


// Считать количество массива
// $countPublishers = count($publishers);
// $countCategories = count($categories);
?>