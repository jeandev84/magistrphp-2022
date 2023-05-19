<?php

# http://php-di.org
/**
 * ДЗ
 *
*/
class Container
{

}


class SomeClassB {}

class SomeClassA
{
     public function __construct()
     {
         echo "Вызван конструктор ". __CLASS__."\n";
     }
}


class FooClass
{
    public function __construct()
    {
        echo "Вызван конструктор ". __CLASS__."\n";
    }
}

class BarClass
{
    public function __construct()
    {
        echo "Вызван конструктор ". __CLASS__."\n";
    }
}

function func(SomeClassA $a, FooClass $foo, BarClass $bar) {
    echo "Вызвана функция ". __FUNCTION__."\n";
    var_dump($a, $foo, $bar);
}

/*
$someB = new SomeClassB();
$someA = new SomeClassA($someB);
func($someA);
*/

$reflectionFunc = new ReflectionFunction('func');
print_r($reflectionFunc->getParameters());

$args = [];

foreach ($reflectionFunc->getParameters() as $parameter) {
    # $classname = $parameter->getClass();
    $arg = $parameter->getClass()->newInstanceArgs();
    # print_r($arg);
    $args[] = $arg;
}

$reflectionFunc->invoke(...$args);