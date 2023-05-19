<?php
// Demo
$q = 10;
$q = NULL;
$q = '';
$q = ' ';
$q = '0';
$q = [1];

// правила ложных значений ( false, NULL, 0, '', '0', [] являются ложными )
if ($q)
    echo "ИСТИНА";
else
    echo "ЛОЖЬ";

echo '<hr>';


$n = -10;
if ($n > 0) {
    echo '<h1>n больше нуля</h1>';
    echo '<h1>n > 0</h1>';
} else {
    echo '<h1>n НЕ больше нуля</h1>';
}


// Ветвления
$hours = (int)strftime('%H'); // date('H');
// $hours = 23;
echo $hours, '<hr/>';

if( $hours >= 8 && $hours <= 18 ) {
    //echo 'Светло';
    echo 'Добрый день';
    // include 'light.php';

} elseif ($hours > 18 && $hours < 23) {
    echo 'Добрый вечер';
} else {
  //echo 'Темно';
  echo 'Доброй ночи';
  // include 'dark.php';
}

echo "<hr />";

if( $hours >= 8 && $hours <= 18 ) {
    echo 'Светло';
} else {
    echo 'Темно';
}

if( $hours >= 8 && $hours <= 18 )
    $r = 'Светло';
else
    $r = 'Темно';

echo $r;

// Тернарный оператор
echo  ($hours > 8 && $hours < 18) ? 'Светло' : 'Темно';

echo "<hr />";
$day = strftime('%u');
switch( $day ){
  case 1: 
  case 2: 
  case 3: 
  case 4: 
  case 5: $t = 'рабочий'; break;
  case 6: 
  case 7: $t = 'выходной'; break;
}
// setlocale(LC_ALL, 'rus' );
echo "{$day} день недели - ({$t})", mb_convert_encoding (strftime('%A') , 'UTF-8', 'cp1251');


// ТЗ
// Задача: Практическая N 2.1
/*
 * 3.
 * Сформировать корректно фразу "N" товаров, для любого целого положетельного N
 * 1 товар
 * 2,3 товара
 * 5+ товар(ов)
 * Нужно при помощью swith перечислать все варианты от 0 до 9
*/

$endingArray = ['товар', 'товара', 'товаров'];

$num = rand(0, 1000); // 123, 1089 ...

$number = $num % 100;

if ($number >= 11 && $number <= 19) {
    $ending = $endingArray[2];
} else {
    $i = $number % 10;
    switch ($i) {
        case 1: $ending = $endingArray[0]; break;
        case 2:
        case 3:
        case 4: $ending = $endingArray[1]; break;
        default: $ending = $endingArray[2];
    }
}

$productsCountExpression = "$num $ending";
