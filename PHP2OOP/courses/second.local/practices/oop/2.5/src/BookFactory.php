<?php
declare(strict_types=1);


class BookFactory
{
    /**
     * @param string $title
     * @param string $author
     * @param string $description
     * @param int $price
     * @return Book
    */
    public static function create(string $title, string $author, string $description, int $price): Book
    {
         return new Book($title, $author, $description, $price);
    }
}