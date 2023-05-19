<?php


# SPL - Standard PHP Library
# https://php.net/manual/ru/book.spl.php


class Book
{
    public function __construct(protected string $title, protected string $description, protected int $price)
    {
    }



    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }



    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }



    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }



    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }



    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }



    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

}


$collection = new SplObjectStorage();


// наша коллекция
$book1 = new Book('PHP1', 'описание книги 1', 1700);
$book2 = new Book('PHP2', 'описание книги 2', 3500);
$book3 = new Book('PHP3', 'описание книги 3', 2800);


// Добавим в коллекции
$collection->attach($book1);
$collection->attach($book2);


// Проверяем на существование объекта
echo "<pre>";
var_dump($collection->contains($book1)); // true
var_dump($collection->contains($book2)); // true
var_dump($collection->contains($book3)); // false


echo "<hr/>";

// Удаляем объект из storage
$collection->detach($book1);
var_dump($collection->contains($book1)); // false
var_dump($collection->contains($book2)); // true
var_dump($collection->contains($book3)); // false
