<?php


// Perl Compatible Regular Expression
// https://en.wikipedia.org/wiki/Perl_Compatible_Regular_Expressions


// Regex - то язык шаблона
// Синтаксис
// https://www.php.net/manual/ru/reference.pcre.pattern.syntax.php

// Работа с числовыми значениями
// [0-9] - \d (digit)
// + значит может быть сколько угодно знаков
// 2022  - \d+ знаков от нуля до девяти могут быть сколько угодно
// \d{4} - должно быть ровно 4 знака

// Работа со строками
// [0-9a-zA-Z_] \w (word) - может быть любой симбол от 0 - 9 или a-z или A-Z
// \w+ - может быть сколько угодно word
// ()  - групируют данные, которые нашли в выражении


// Маска (Placeholders)
// ${2} ${1} ${3} номер скобки с которыми будем работать
// ${2} ${1} ${3} => (\w+) (\d+) | , | (\d+)

$string = 'April 15, 2022';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '${2} ${1} $3';
echo preg_replace($pattern, $replacement, $string); // 15 April 2022