<?php

// Объявим интерфейс 'Template'
interface Template
{
    public function setVariable($name, $var);
    public function getHtml($template);
}

// Реализация интерфейса
// Это будет работать
class WorkingTemplate implements Template
{
    private $vars = [];

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }

    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }

        return $template;
    }
}



// Iterator
// Iterator наследует от Traversable
// Traversable - это объект который может использовать как массив
// Iterator    - это расшерешие Traversable, у него больше удобные методы
class ArrayCollection implements Iterator
{

    /**
     * @var int
    */
    private $position = 0;


    /**
     * @var array
    */
    protected $items = [];


    /**
     * @param array $items
    */
    public function __construct(array $items)
    {
        $this->items    = $items;
        $this->position = 0;
    }



    /**
     * Возвращает текущий элемент во время итерации
     *
     * @return mixed|void
    */
    public function current()
    {
        return $this->items[$this->position];
    }



    /**
     * Возвращает порядка следующий элемент в массиве во время итерации
     *
     * @return void
    */
    public function next()
    {
        ++$this->position;
    }



    /**
     * Возвращает порядка текущего элемент в массиве во время итерации
     *
     * @return mixed|void|null
    */
    public function key()
    {
        return $this->position;
    }



    /**
     * Проверяет существование текущего элемета массива во время итерации
     *
     * @return bool|void
    */
    public function valid()
    {
        return isset($this->items[$this->position]);
    }



    /**
     * Сброс итерации - Инициализирует
     *
     * @return void
    */
    public function rewind()
    {
        $this->position = 0;
    }
}


// Collections
$collection = new ArrayCollection([
    ['title' => 'Book1', 'price' => 150],
    ['title' => 'Book2', 'price' => 370],
]);

foreach ($collection as $key => $value) {
     var_dump($key, $value);
     echo "\n";
}