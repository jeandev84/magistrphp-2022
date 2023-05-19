<?php
declare(strict_types=1);

namespace App\Entity\Book;


class Book
{
     public $id;
     public $title;
     public $price;

     public function __construct(string $title, float $price)
     {
         $this->title = $title;
         $this->price = $price;
     }
}