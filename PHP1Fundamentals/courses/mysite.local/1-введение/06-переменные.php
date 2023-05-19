<?php

// Переменные   - это именнованые блок памяти
// Мы даем какое-то имя где будет храниться данные в памяти
// в переменных храним какое-то значение

// camel notation
$firstName = 'Иван';
$name      = &$firstName; // name = 'Ивана';
$name      = 'Сергей'; // name = 'Сергей';

echo "<h1>firstName : $firstName</h1>";
echo "<h1>name : $name</h1>";

$userPrefferedColor = "red";
$age = 45;

// <h1>Привет, Иван - 45!</h1>
echo "<h1>Привет, $firstName - $age!</h1>";


$some = 123;
$isProgrammer = true;
$зарплата = 1e5;// но так лучше не делать ( 1 * 10 ** 5 = 100 000)

// Псевдоним переменны $firstName или Ссылка на переменную
$name = &$firstName;

$зарплата = $зарплата + 1000;
$зарплата += 1000;

// unset($some);//удаление переменной

echo " $firstName $age $some $isProgrammer $name $зарплата<hr>";

$tmp = 'age';

//переменные переменных
echo $$tmp;