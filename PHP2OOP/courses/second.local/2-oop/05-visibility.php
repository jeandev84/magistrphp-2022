<?php
/**
 * Определение MyClass
 */
class MyClass
{
    // Модификации доступа (public, private, protected)
    public $public = 'Public';
    protected $protected = 'Protected';
    private $private = 'Private';

    function printHello()
    {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
}

$obj = new MyClass();
echo $obj->public; // Работает
//echo $obj->protected; // Неисправимая ошибка
//echo $obj->private; // Неисправимая ошибка
$obj->printHello(); // Выводит Public, Protected и Private


/**
 * Определение MyClass2
 */
class MyClass2 extends MyClass
{
    // Мы можем переопределить общедоступные и защищённые свойства, но не закрытые
    public $public = 'Public2';
    protected $protected = 'Protected2';

    function printHello()
    {
        echo $this->public;
        echo $this->protected;
        //echo $this->private;
    }
}

$obj2 = new MyClass2();
echo $obj2->public; // Работает
//echo $obj2->private; // Неопределён
//echo $obj2->protected; // Неисправимая ошибка
$obj2->printHello(); // Выводит Public2, Protected2, Undefined

?>