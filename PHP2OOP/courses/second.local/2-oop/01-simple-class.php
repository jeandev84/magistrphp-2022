<?php

class SimpleClass
{
    // объявление свойства
    public $var = 'значение по умолчанию';

    // объявление метода
    public function displayVar() {
        echo $this->var;
    }
}

$instance = new SimpleClass();
echo $instance->var, "<hr/>";
$instance->displayVar();

// Это же можно сделать с помощью переменной:
$className = 'SimpleClass';
$instance = new $className(); // new SimpleClass()