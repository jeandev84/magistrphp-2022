<?php

// РАБОТА С ДАТОЙ ВРЕМЕНИ

/*
 * https://php.net/manual/ru/intro.datetime.php
 * https://php.net/manual/ru/dateinterval.construct.php
 * P2D    : Period 2 days
 * PT2S   : Period 2 seconds
 * P6YT5M : Period 6 years and 5 minutes
*/

# Добавляем 1 день нашей дате
$dt1 = new DateTimeImmutable('2020-02-15');
$dt1 = $dt1->modify('1 day');

echo '<pre>', print_r($dt1), '</pre>';
echo '<pre>', $dt1->format('d-m-Y H:i:s'), '</pre>';
echo '<pre>', $dt1->format(DateTimeInterface::W3C), '</pre>';


# Добавляем 10 дней нашей дате
$dt2 = new DateTimeImmutable('2020-12-10');
$dt2 = $dt2->modify('+10 day');
echo '<pre>', $dt2->format(DateTimeInterface::RFC7231), '</pre>';

// return object DateInterval()
echo '<pre>', print_r($dt2->diff($dt1)), '</pre>';



# Мы хотим чтобы нашу дату стала больше 3 месяца
$interval = new DateInterval('P3M');
$dt2->add($interval);
echo '<pre>', $dt2->format(DateTimeInterface::RFC7231), '</pre>';



# Мы смотрим что вперёд будет
# $dt1: дата начала (start)
# $interval: дата интервал (interval)
# $dt2: дата конца  (end)
$dateRange = new DatePeriod($dt1, $interval, $dt2);

foreach ($dateRange as $date) {
    echo $date->format('d-m-Y H:i:s'), "<hr>";
}


# DZ :
# Calendar
