<?php

include 'autoload.php';


// Books
// $book1 = new Book('PHP1', 'Автор1', '', 1000);
// $book2 = new Book('PHP2', 'Автор2', '', 2000);
// echo $book1->getHTML();
// echo $book2->getHTML();


// Journal
// $journal1 = new Journal("PHP Inside", "Автор4", "", 250);


$books = [
    new Book('PHP-1', 'Шуйков Сергей Юрьевич', 'описание книги PHP-1 от Ю. Сергей.', 3500),
    new Book('PHP-2', 'Тарасов Алексей Владимирович', 'описание книги PHP-2 от Т. Алексей..', 7700),
];


$journals = [
    new Journal("PHP Inside", "Автор4", "", 100)
];

// var_dump($books);
// var_dump($journals);


// Выводим на экран
echo "<h1>Books</h1>";
foreach ($books as $book) {
    echo $book->get(), "<hr/>";
}


echo "<h1>Journals</h1>";
foreach ($journals as $journal) {
    echo "<pre>", var_dump($journal->get(Goods::GOODS_ARRAY)), "</pre>";
}