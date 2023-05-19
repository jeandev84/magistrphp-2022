<?php

use src\Book;
use src\BookFabric;
use src\GoodsCollection;
use src\Journal;

include "autoload.php";

$book1 = new Book("PHP1", "Автор1", "", 1000);
$book2 = new Book("PHP2", "Автор2", "", 2000);
$journal1 = new Journal("PHP Inside", "Автор3", "", 100);
$book3 = BookFabric::get("PHP3", "Автор3", "", 1500);
$book4 = clone $book2;

$gc = new GoodsCollection(
    [$book1, $book2, $journal1, $book3, $book4]
);
$gc->show();
$gc->show = 3;
echo "<pre>",var_dump($gc),"</pre>";
echo "<hr>";
$gc->show();
echo "<hr>";

$book1();

if( $book1 instanceof Book ){
    echo "Принадлежит<br />";
}
if( get_class($book1) === 'Book' ){
    echo "Принадлежит<br />";
}