<?php
declare(strict_types=1);


class Book extends Goods implements IGoods
{

    private string $author;
    private string $description;
    static public $counter = 0; // счетик чтобы понять сколько раз объект был вызван.



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
        self::$counter++;
    }




    /**
     * Возвращает HTML формат о книге
     *
     * @return string
     */
    public function getHTML(): string
    {
        return <<<HTML
             <div class='book'>
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
     * @return string
     */
    public function get(string $format = Goods::GOODS_HTML): string {
        $method = "get".$format;
        return $this->{$method}();
    }



    /**
     * Деструктор книга - уничтожает книгу
     */
    public function __destruct()
    {
        echo "Книга '{$this->title}' удалена<br>";
    }
}