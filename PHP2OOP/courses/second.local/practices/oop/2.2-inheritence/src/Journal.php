<?php

class Journal extends Goods
{

    protected string $author;
    protected string $description;



    /**
     * Конструктор книги
     *
     * @param string $title
     * @param string $author
     * @param string $description
     * @param int $price
     */
    public function __construct(string $title, string $author, string $description, int $price)
    {
        parent::__construct($title, $price);
        $this->author = $author;
        $this->description = $description;
    }




    /**
     * Возвращает HTML формат о книге
     *
     * @return string
     */
    public function getHTML(): string
    {
        return <<<HTML
             <div class='journal'>
                 <div class="title">$this->title</div>
                 <div class="author">$this->author</div>
                 <div class="description">$this->description</div>
                 <div class="price">$this->price</div>
            </div>
HTML;

    }


    /**
     * @return array
     */
    public function getARRAY()
    {
        return [
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description,
            'price' => $this->price,
        ];
    }





    /**
     * @return false|string
     */
    public function getJSON()
    {
        return json_encode($this->getArray());
    }




    public function getCSV()
    {
         return '';
    }



    /**
     * Получить формат книги по заданну формат getFormat()
     *
     * @param string $format
     * @return mixed
     */
    public function get(string $format = Goods::GOODS_HTML): mixed {
        $method = "get". $format; // getHTML, getJSON, ...
        return $this->{$method}();
    }



    /**
     * Деструктор книга - уничтожает книгу
     */
    public function __destruct()
    {
        echo "Журнал '{$this->title}' удален<br>";
    }
}