<?php
// Статическое переменное свойство
// Статическое функция

class MyClass {
    const CONST_VALUE = 'Значение константы';
}

$classname = 'MyClass';
echo $classname::CONST_VALUE;

echo MyClass::CONST_VALUE;



class OtherClass extends MyClass
{
    public static $my_static = 'статическая переменная';

    public static function doubleColon() {
        echo parent::CONST_VALUE . "\n";
        echo self::$my_static . "\n";
    }
}

$classname = 'OtherClass';
$classname::doubleColon();

OtherClass::doubleColon();


class Cat {

    public static $counter = 0;


    public function __construct()
    {
        echo ++self::$counter, "<hr/>";
    }


    /**
     * @param $name
     * @return static
    */
    public static function create($name)
    {
        return new static();
        // parent::$counter - если вызвать из родительского класса
    }
}

$cat1 = new Cat();
$cat2 = new Cat();
$cat3 = new Cat();
Cat::create('product1');
echo Cat::$counter;
?>