<?php

class Book{
  public $title;
  public $authors;
  public $description;
  public $pubyear;
  public $price;
}

$book = new Book; //new Book();

$book->title = 'Название книги';
$book->authors = 'Имена авторов ФИО, ФИО';
$book->description = 'Очень интересная книга';
$book->pubyear = 2020;
$book->price = 980;

?>


<h2><?= $book->title ?></h2>
<p>Авторы: <?= $book->authors ?></p>
<p>Описание книги: <?= $book->description ?></p>
<p>Год издания: <?= $book->pubyear ?></p>
<p>Цена: <?= $book->price ?>руб. <del><?= $book->price * 1.1?>руб.</del></p>