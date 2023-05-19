<?php

// Examples

/*
function sayHello() {
    echo "<h1>Привет!</h1>";
}

sayHello();
sayHello();
*/


// $userName - формальный параметр
function sayHello($userName = "Незнакомец") {
    echo "<h1>Привет, $userName!</h1>";
}

// Сергей - Фактический парамер
sayHello("Сергей");
sayHello("Костя");
sayHello();

/*
sayHello(3);
sayHello([]);
*/


// Функция - это именована блок оператора
// функция принимает два аргумента и возвращает их сумму
// функция используется чтобы избежать от дублирования кода
function sumTwoNumber($a, $b) {
  return $a + $b;
}
echo sumTwoNumber(3, 5), "\n<br/>" ; //8


$makefoo = true;
if ($makefoo) {
  //функция создавамая по условию
  function foo()
  {
    echo "Я существую как только выполнилась эта часть if.\n<br/>";
  }
}
if ($makefoo) {
  foo();
}


//вложенные функции
function foo2() 
{
  function bar2() 
  {
    echo "Я существую с момента вызвова foo().\n<br />";
  }
}
foo2();
bar2();

//рекурсивная функция (вызывает сама себя)
//обычно нужна для древовидных структур и
//рекурсивных вычислений
function recursion($a)
{
  if ($a < 20) {
    echo "$a\n";
    recursion($a + 1);
  }
}
echo recursion(3);