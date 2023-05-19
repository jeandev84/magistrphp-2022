<?php

// include 'Book.php';

spl_autoload_register(function ($class) {
    @require_once __DIR__ . "/books.php";
});


$book1 = new Book('PHP1', 'Автор1', '', 1000);
$book2 = new Book('PHP2', 'Автор2', '', 2000);
echo $book1->getHTML();
echo $book2->getHTML();



$books = [
    new Book('PHP-1', 'Шуйков Сергей Юрьевич', 'описание книги PHP-1 от Ю. Сергей.', 3500),
    new Book('PHP-2', 'Тарасов Алексей Владимирович', 'описание книги PHP-2 от Т. Алексей..', 7700),
];


// var_dump($books);

foreach ($books as $book) {
    echo $book->get(), "<hr/>";
}