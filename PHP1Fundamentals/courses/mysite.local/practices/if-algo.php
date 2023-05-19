<?php

$shop  = 'close';
$money = 0;


if ($shop == "open") {
   echo "Иду в магазин";
} else {
    echo "Иду в киоск";
}


if ($shop and $money) {
    echo "Иду в магазин";
    echo "Покупаю хлеб";
} else {
    echo "Иду домой";
    echo "Туплю в телевизор";
}


// https://www.php.net/manual/fr/function.rand.php

//$num = rand(101, 999);
//echo $num;
//$r = $num % 100;
//echo $r;


//echo strftime('%Y');
//echo strftime('%H');

//echo date('Y');
//echo date('H');

//$day = strftime('%u');
//switch( $day ){
//    case 1:
//    case 2:
//    case 3:
//    case 4:
//    case 5: $t = 'рабочий'; break;
//    case 6:
//    case 7: $t = 'выходной'; break;
//}
//
//setlocale(LC_ALL, 'rus' );
//echo "{$day} день недели - ({$t}) ", mb_convert_encoding (strftime('%A') , 'UTF-8', 'cp1251');
//
//
//echo "<hr>";
//
//// /home/yao/Desktop/magistrphp2022/mysite.local/demo.php
//$filename = __FILE__;
//
//
//// Position
//$position = strripos($filename, DIRECTORY_SEPARATOR);
//// echo "Pos = $position";
//
//
//// Вырезамем строку относительно порядки номера
//$page = substr($filename, $position + 1);
//
//
//// Выводим на экран
//echo $page; // demo.php
//
//
//echo "<hr>";


//$countProducts = 121;
//
//// [0-10], [11-100], [101-1000]
//// получить 2 последные цифры числа, оcтатка от деления 123 на 100 будет ( 123 = 100 * 1 + 23 )
//$twoDoubleNumbers = $countProducts % 100; // 23
//
//// получить последную цифру, остатки от деления 123 на 100 ( 23 = 10 * 2 + 3 )
//$lastNumber = $twoDoubleNumbers % 10; // 3
//
//
//switch ($lastNumber) {
//    case 0:
//    case 1: $expression = 'товар'; break;
//    case 2:
//    case 3:
//    case 4:$expression = 'товара'; break;
////    case 5:
////    case 6:
////    case 7:
////    case 8:
////    case 9: $expression = 'товаров'; break;
//    default: $expression = 'товаров'; break;
//}
//
//echo "$countProducts $expression";

//
//$endingArray = ['товар', 'товара', 'товаров'];
//
//$number = rand(0, 1000);
//
//$number = $number % 100;
//
//echo $number;
//
//if ($number >= 11 && $number <= 19) {
//    $ending = $endingArray[2];
//} else {
//    $i = $number % 10;
//    switch ($i) {
//        case 1: $ending = $endingArray[0]; break;
//        case 2:
//        case 3:
//        case 4: $ending = $endingArray[0]; break;
//        default: $ending = $endingArray[2];
//    }
//}
//
//echo "$number $ending";
//
//echo "<hr>";
//
//function getExpression($number, array $endingArray) {
//
//    $number = $number % 100;
//
//    if ($number >= 11 && $number <= 19) {
//        $ending = $endingArray[2];
//    } else {
//        $i = $number % 10;
//        switch ($i) {
//            case 1: $ending = $endingArray[0]; break;
//            case 2:
//            case 3:
//            case 4: $ending = $endingArray[1]; break;
//            default: $ending = $endingArray[2];
//        }
//    }
//
//    return $ending;
//}
//
//echo "$number ". getExpression($number, $endingArray);