<?php

// РАБОТА С ЗАМЕКАНИЕМ
// Функция с обратной вызова

# https://php.net/manual/ru/class.closure.php

/*
$word = 'текст';

$fn =  function () use ($word) {
  var_dump($word);
};

$fn();
*/


class Cat
{
     /**
      * @var string
     */
     protected $name;


     /**
      * @var int
     */
     public $age;



     /**
      * @param $name
     */
     public function __construct($name)
     {
          $this->name = $name;
     }


     /**
      * @return string
     */
     public function getName(): string
     {
        return $this->name;
     }

}


$barsik = new Cat('Барсик');
$murzik = new Cat('Мурзик');


$closure = function ($breed) {
   $this->breed = $breed;
};

$closure->call($barsik, 'Као-мани');
$closure->call($murzik, 'Тайская');


echo '<pre>';
var_dump($barsik, $murzik);
echo '</pre>';


$changeAge = function ($delta) {
   $this->age += $delta;
};


$changeAgeBarsik = $changeAge->bindTo($barsik);
$changeAgeBarsik(2);


$changeAgeMurz = Closure::bind($changeAge, $murzik);
$changeAgeBarsik(3);

var_dump($barsik, $murzik);


$changeAgeMurz = Closure::bind(function ($delta) {
    $this->age += $delta;
}, $murzik);