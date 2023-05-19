<?php

// class Book{
//   public $title;
//   public $authors;
//   public $description;
//   public $pubyear;
//   public $price;
// }

$books = json_decode(file_get_contents('books.json'));

?>

<?php foreach($books as $uid => $book){  ?>

<h2><?= $book->title ?></h2>
<p>Авторы: <?= $book->authors ?></p>
<p>Описание книги: <?= $book->description ?></p>
<p>Год издания: <?= $book->pubyear ?></p>
<p>Цена: <?= $book->price ?>руб. <del><?= $book->price * 1.1?>руб.</del></p>

<?php }  ?>