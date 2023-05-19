<?php
namespace Tests\App\Entity\Book;

use App\Entity\Book\Book;
use PHPUnit\Framework\TestCase;


class BookTest extends TestCase
{

     public function testCheckCorrectPropTitleInCreate()
     {
          $title = "PHP9";
          $book = new Book($title, 1000);
          $this->assertEquals($title, $book->title);
     }
}