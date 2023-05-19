<?php

// echo uniqid("", true),'<hr />';

$books = [
  '5ec910f1dfc922' =>  [
    'title' => 'PHP 7',
    'authors' => 'Котеров Дмитрий Владимирович, Симдянов Игорь Вячеславович',
    'description' => 'Подробное руководство',
    'pubyear' => '2019',
    'price' => '1170',
  ],
  '5ec910fd9a3d67' =>  [
    'title' => 'Разработка веб-приложений с помощью PHP и MySQL',
    'authors' => 'Люк Веллинг, Лора Томсонт',
    'description' => 'Удобное руководство',
    'pubyear' => '2017',
    'price' => '2585',
  ],
  '5ec91109d335f2' => [
    'title' => 'PHP. Объекты, шаблоны и методики программирования',
    'authors' => 'Зандстра Мэт',
    'description' => 'Интересная книга',
    'pubyear' => '2019',
    'price' => '2068',
  ],


];
// file_put_contents('books.json',json_encode($books));
// $books = json_decode(file_get_contents('books.json'), true);

?>

<?php foreach($books as $uid => $book):  ?>

<h2><?= $book["title"] ?></h2>
<p>Авторы: <?= $book["authors"] ?></p>
<p>Описание книги: <?= $book["description"] ?></p>
<p>Год издания: <?= $book["pubyear"] ?></p>
<p>Цена: <?= $book["price"] ?>руб. <del><?= $book["price"] * 1.1?>руб.</del></p>

<?php endforeach;  ?>