<?php

// Автозагрузка классов
require_once __DIR__ . '/autoload.php';


/*
 $goods = [
    new Book('PHP-1', 'Шуйков Сергей Юрьевич', 'описание книги PHP-1 от Ю. Сергей.', 3500),
    new Book('PHP-2', 'Тарасов Алексей Владимирович', 'описание книги PHP-2 от Т. Алексей..', 7700),
    BookFactory::create("PHP3", "Авторз", "", 1500),
    new Journal("PHP Inside", "Автор4", "", 250)
];

$goodsCollection->show();


$goodsCollection = new GoodsCollection([
    new Book('PHP-1', 'Шуйков Сергей Юрьевич', 'описание книги PHP-1 от Ю. Сергей.', 3500),
    new Book('PHP-2', 'Тарасов Алексей Владимирович', 'описание книги PHP-2 от Т. Алексей..', 7700),
    BookFactory::create("PHP3", "Авторз", "", 1500),
    new Journal("PHP Inside", "Автор4", "", 250)
]);

$goodsCollection = new GoodsCollection($goods);
$goodsCollection->show();
*/

$book1    = new Book('PHP-1', 'Шуйков Сергей Юрьевич', 'описание книги PHP-1 от Ю. Сергей.', 3500);
$book2    = new Book('PHP-2', 'Тарасов Алексей Владимирович', 'описание книги PHP-2 от Т. Алексей..', 7700);
$journal1 = new Journal("PHP Inside", "Автор4", "", 250);
$book3    = BookFactory::create("PHP3", "Авторз", "", 1500);
$book4    = clone $book2;


// Collection
$goodsCollection = new GoodsCollection(
    [$book1, $book2, $journal1, $book3, $book4]
);

$goodsCollection->show();


// Выводим объект как строка при помощью __toString()
$book = new Book('Книга', 'Автор', 'описание книга', 2000);
echo $book;


// Вызывем объект как функцию при помощью __invoke();
$book();


// Проверяем является ли $book экземпляр класс Book
if ($book instanceof Book) {
    echo "Принадлежит<br/>";
}


if ($book instanceof Goods) {
    echo "Принадлежит<br/>";
}


if (get_class($book) === Book::class) {
    echo "Принадлежит<br/>";
}


