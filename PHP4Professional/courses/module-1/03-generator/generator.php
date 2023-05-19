<?php

// ГЕНЕРАТОР
// Iterator
# https://www.php.net/manual/ru/language.oop5.interfaces.php
# https://www.php.net/manual/ru/class.generator.php
# https://www.php.net/manual/ru/class.iterator.php (Iterable data)
# https://www.php.net/manual/ru/language.generators.overview.php (Generator data)
# https://www.php.net/manual/ru/language.generators.overview.php
# https://www.php.net/manual/ru/class.generator.php


function nextNumberShow() {
    yield 10;
    yield 20;
    yield 30;
}


foreach (nextNumberShow() as $value) {
    echo $value, "<hr>";
}



function nextNumber($start, $limit, $delta = 1) {

    while ($start < $limit) {
          yield $start;
          $start += $delta;
    }
}


// Выводим нечетные числа от диапазона [3-30] с интервалом 2
// от 3 до 30 интервал 2.
foreach (nextNumber(3, 30, 2) as $value) {
    echo $value, "<hr>";
}




function readLines(string $file) {
    $lines = file($file);
    for ($i = 0; $i < count($lines); $i++) {
        yield $lines[$i];
    }
}


foreach (readLines(__DIR__ . "/generator.php") as $k => $v) {
    echo "$k/ $v<hr/>";
}