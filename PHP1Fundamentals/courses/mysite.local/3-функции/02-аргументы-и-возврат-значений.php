<?php

//строгая типизация
// declare(strict_types=1);
// int, string, float, array, callable
// callable - это строка содержающая имя функции

// function sum(int $a, int $b)
// {
//     return $a + $b;
// }
// var_dump(sum(1, 2)); // 3
// var_dump(sum(1.5, 2.5)); // 3


// TypeHint
// PHP по умолчанию будет переобразовать явно типизации данных при помочью TypeHint
function sumIntegers(int $a, int $b){
    return $a + $b;
}

// var_dump(sumIntegers(1.5, 2.5)); // 3 = 1 + 2
// var_dump(sumIntegers("1", "2")); // 3 = 1 + 2
// var_dump(sumIntegers("1", "abc")); // error


// Включаем чтобы PHP не приобразовал тип данных (Строгая типизации данных)
// то есть если передадим неожидаемый тип параметра, будет ошибка
declare(strict_types=1);

var_dump(sum(3, 4));
// var_dump(sum("2", "5")); выдаст ошибка


$g = 0;
$summa = 100;


//передача массива
function sum1(array $input) {

  // return $input[0] + $input[1];
  global $g;

  echo "Global $g<br>";

  $summa = 0; // local

  foreach ($input as $n) {
       $summa += $n;
  }

  return $summa;
}


function sum2() {
   $summa = 200;
}


//echo sum1([3,5]), '<hr>';
echo sum1([3,5, 7, 1]), '<hr>';
echo $summa, '<hr>';



// Передача параметра по копию
function test1($k) {
   $k++;
   echo "<h2>Test 1 k : $k</h2>";
}


$k = 100;
test1($k);
echo "<h2>Global 1 k : $k</h2>"; // 100


// передача параметра по ссылке
function test2(&$k) {
    $k++;
    echo "<h2>Test 2 k : $k</h2>";
}



$k = 100;
test2($k);
echo "<h2>Global 2 k : $k</h2>"; // 101

//передача объекта
// class Car{
//   public $color = 'красный';
// }
// $object = new Car;
// function show( $cat )
// {
//   return $cat->color;
// }
// echo show($object), '<hr>';

//передача по ссылке
function foo1( $a )
{
  $a += 10;
}
function foo2( &$a )
{
  $a += 10;
}
$q = 100;
foo1( $q ); //foo2( $q );
echo $q , '<hr>';

//аргумент по умолчанию - пример из доков
function makecoffee($type = "капучино")
{
  return "Готовим чашку $type.\n";
}
echo makecoffee(), '<hr>';
echo makecoffee(null), '<hr>';
echo makecoffee("эспрессо"), '<hr>';


//список аргументов переменной длины
function sum(...$numbers) {
  $acc = 0;
  foreach ($numbers as $n) {
      $acc += $n;
  }
  return $acc;
}
echo sum(1, 2, 3, 4), '<hr>';


//распаковка массива
function add($a, $b) {
  return $a + $b;
}
echo add(...[1, 2])."\n";

$a = [1, 2];
echo add(...$a), '<hr>';


//старый вариант
//см func_num_args(), func_get_arg() и func_get_args()
function sum5() {
  $acc = 0;
  foreach (func_get_args() as $n) {
      $acc += $n;
  }
  return $acc;
}

echo sum5(1, 2, 3, 4), '<hr>';