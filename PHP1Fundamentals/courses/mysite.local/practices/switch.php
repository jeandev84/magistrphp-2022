<?php

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