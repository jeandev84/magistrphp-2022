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

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <!-- <link href="starter-template.css" rel="stylesheet"> -->

    <title>PHP часть 1. Основы PHP</title>

    <style>
        .card-deck{
            margin-top: 20px
        }

        .card-body img{
            display: block;
            margin: 0 auto 15px;

        }
        .card-footer{
            background: transparent;
            border: 0;
        }
    </style>
</head>
<body>

<h1><?= $title ?></h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">Интернет-магазин Книжка</a>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="книгу.." aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Найти!</button>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php foreach ($menu as $url => $title): ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= $url ?>">
                            <?= $title ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>

<div class="container">

    <div class="row">
        <div class="col-md-3 col-sm-3 ">

            <h4>
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

                    // Задача: Практическая N 2.1
                    /*
                     * 3.
                     * Сформировать корректно фразу "N" товаров, для любого целого положетельного N
                     * 1 товар
                     * 2,3 товара
                     * 5+ товар(ов)
                     * Нужно при помощью swith перечислать все варианты от 0 до 9
                    */

                    $endingArray = ['товар', 'товара', 'товаров'];

                    $num = rand(0, 1000); // 123, 1089 ...

                    $number = $num % 100;

                    if ($number >= 11 && $number <= 19) {
                       $ending = $endingArray[2];
                    } else {
                     $i = $number % 10;
                     switch ($i) {
                        case 1: $ending = $endingArray[0]; break;
                        case 2:
                        case 3:
                        case 4: $ending = $endingArray[0]; break;
                        default: $ending = $endingArray[2];
                    }
                  }

                  $productsCountExpression = "$num $ending";
                ?>
            </h4>

            <div class="row">
                <?php if(count($categories) > 0): ?>
                   <?php foreach ($categories as $category): ?>
                        <a class="dropdown-item" href="#"><?= $category ?></a>
                   <?php endforeach; ?>
                <?php else: ?>
                    элементов нет
                <?php endif; ?>
            </div>
            <hr>

            <h4>Цена</h4>

            <div class="row">
                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">от</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> &nbsp;
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">до</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">&nbsp;

                    <button type="button" class="btn btn-success">Найти</button>
                </div>
            </div>
            <hr>
            <h4>Издательство</h4>

            <div class="row">
                <?php if (count($publishers) > 0): ?>
                    <ul class="list-group col-md-12 col-sm-12">
                        <?php foreach ($publishers as $publisher): ?>
                            <li class="list-group-item">
                                <input type="checkbox"   id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1"><?= $publisher ?></label>
                            </li>
                        <?php endforeach; ?>
                        <li class="list-group-item">
                            <button type="button" class="btn btn-success">Найти</button>
                        </li>
                    </ul>

                <?php else: ?>
                     элементов нет
                <?php endif; ?>

            </div>
            <hr>


        </div>

        <div class="col-md-9 col-sm-9 ">
            <h1>Каталог</h1>
                <?php foreach ($books as $bookItems): ?>
                  <div class="card-deck">
                     <?php foreach ($bookItems as $book): ?>
                        <div class="card">
                            <div class="card-body">
                                <img src="<?= $book['img'] ?>"  alt="<?= $book['title']?>">
                                <h3 class="card-title"><?= $book['price'] ?>руб</h3>
                                <p class="card-text"><small class="text-muted">Автор: <?= $book['author'] ?></small></p>
                                <p class="card-text"><?= $book['description']?> Издательство: <a href="#">Полезное</a></p>
                            </div>
                            <div class="card-footer">
                                <!--                        <button type="button" class="btn btn-primary">В корзину</button> -->
                                <a href="?add=<?= $book['idbook'] ?>" class="btn btn-primary">В корзину</a>
                            </div>
                        </div>
                     <?php endforeach; ?>
                  </div>
                <?php endforeach; ?>
    </div>

</div>

<div class="container">


</div><!-- /.container -->

<?php
 require_once "inc/footer.inc.php";
?>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>