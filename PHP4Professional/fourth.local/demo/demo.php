<?php

// https://php.net/manual/ru/intro.datetime.php
/*
$datetime = new DateTime('2020-02-15');
echo '<pre>';
print_r($datetime);
echo '</pre>';

$dateImmutable = new DateTimeImmutable('2020-02-15');
$date1 = $dateImmutable->modify('1 day');
*/


// РАБОТА С ЗАМЕКАНИЕМ
// Функция с обратной вызова

# https://php.net/manual/ru/class.closure.php

$word = 'текст';

$fn =  function () {

};

echo gettype($fn); // object (Closure)

function test() {}
echo gettype('test'); // string



function xrange($start, $limit, $step = 1)
{
    if ($start <= $limit) {
        if ($step <= 0) {
            throw new LogicException('Шаг должен быть положительным');
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            yield $i;
        }
    } else {
        if ($step >= 0) {
            throw new LogicException('Шаг должен быть отрицательным');
        }

        for ($i = $start; $i >= $limit; $i += $step) {
            yield $i;
        }
    }
}


// ГЕНЕРАТОР
// Iterator
# https://www.php.net/manual/ru/language.oop5.interfaces.php
# https://www.php.net/manual/ru/class.generator.php
# https://www.php.net/manual/ru/class.iterator.php (Iterable data)
# https://www.php.net/manual/ru/language.generators.overview.php (Generator data)


function nextNumberShow()
{
    yield 10;
    yield 20;
    yield 30;
}


foreach (nextNumberShow() as $value) {
    echo $value, "<hr>";
}


function nextNumber($start, $limit, $delta = 1)
{

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


function readLines(string $file)
{
    $lines = file($file);
    for ($i = 0; $i < count($lines); $i++) {
        yield $lines[$i];
    }
}


foreach (readLines(__DIR__ . "/generator.php") as $k => $v) {
    echo "$k $v<hr>";
}