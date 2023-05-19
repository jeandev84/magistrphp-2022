<?php

define('WEEK_DAYS', 7);
define('AUTHOR', 'Alex');
define('WEEKS', [3, 8, 10]);

const DBNAME = 'название базы';

echo WEEK_DAYS, '<hr>';
echo AUTHOR, '<hr>';
echo WEEKS, '<hr>';
echo DBNAME, '<hr>';

//предопределённые константы
echo 'Версия PHP: ' . PHP_VERSION, '<hr>';
echo 'Символ конца строки: ' .PHP_EOL, '<hr>';
echo 'Максимальное целое число: ' .PHP_INT_MAX, '<hr>';
echo 'Минимальное целое число: ' .PHP_INT_MIN, '<hr>';
echo 'Максимальное дробное число: ' .PHP_FLOAT_MAX , '<hr>';
echo 'Минимальное дробное число: ' .PHP_FLOAT_MIN , '<hr>';

//волшебные константы
echo 'Номер текущей строки: ' .__LINE__, '<hr>';
echo 'Название текущего файла: ' .__FILE__, '<hr>';
echo 'Название текущей папки: ' .__DIR__, '<hr>';
echo 'Текущее пространство имён: ' .__NAMESPACE__, '<hr>';
