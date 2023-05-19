<?php

/*
 Типы данных
  - boolean
  - integer
  - float
  - string
  - array
  - object
  - resource
  - NULL

  $f = 1.2e3   = (1.2 * 10 ** 3 = 1200)
  $f = 7E - 10 = (7 * 10 ** (-10) = 0.0000000007 = 7 / (10 ** 10))
*/

// Конкатенация
$hello = 'Привет';
$name  = 'Сергей';

$result = $hello .' '. $name . '!';
$result = "$hello $name!";


// Способ 2. (Синтаксический сахар)
$result = "$hello $name";
$result .= '!;';

echo $result, '<hr>';


// Получить количество симболов в строке
$n = strlen($result); //26 байтов
$n = iconv_strlen($result); //14 байтов
$n = mb_strlen($result); // 14 байтов
echo "String length: $n";


//$str = 'This is a test';
//
//// $first = $str{0}; // php 7.4
//$first = $str[0];
//
//echo $first;


// Сохращения
$n = 10;

// Increment и Decrement
//$n = $n + 1;
//$n += 1;
//$n -= 1;
//$n--;

// ++$n; // prefix
$m = ++$n; // возвращает результат increment
echo "n = $n m = $m"; // n = 11 m = 11


// $n++; // suffix
$m = $n++; // не возвращает результат incrementt
echo "n = $n m = $m"; // n = 11 m = 10;

echo '<hr>';

// Cast type (переведение)
$n = 10;
$b = (boolean)$n;


$n = 10;
$m = 10;

// Операторы сравнения
$r = ($n == $m); // boolean

$n = 10;
$m = 11;
$r = ($n != $m); // boolean


$r = ($n > $m);
$r = ($n < $m);
$r = ($n >= $m);
$r = ($n <= $m);

echo $r;


// Логические
$a = true;
$b = false;

// Логическое и
$r = ($a && $b); // $a and $b (false)


// Логическое или
$r = ($a || $b); // $a or $b  (true)


// Логическое не
$r = !$a; // false


// Проверяем если попадает в диапазоне (0 - 100)
$n = 23;
$interval = ($n > 0) && ($n <= 100);


// ТЗ (Остатка отделения случайного числа)
$n = rand(0, 100); // 123 например

// $r = (($n % 100) < 5) or (($n % 100) > 20);
$r = (($n % 100) < 5) || (($n % 100) > 20);


// Пратическая N 13, Пункт 6.
// https://www.php.net/manual/fr/function.rand.php

$num = rand(101, 999);
$r = $num % 100;
echo $r;

// (Синтаксический сахар: это одно и тоже действия можно написать несколько разных способ)
//$n = 10;
//$n = $n + 5;
//$n += 5;
//
//$n = $n * 3;
//$n *= 3;



// Тип данных
$logical = true;

$integer = 23;
$integer = 017; // 1 * 8 + 7 = 15
$integer = 17;  // 17

$float = 23.89;
$float = 2.2e-4; // ( 2.2 * 10 ** (-4) )

$string = 'привет, $float'; // привет, $float
$string = "привет, $float"; // привет, 23.89
$string = 'h1 { color: "red"; }';

// heredoc : <<< ( 3 угловые скобочки )
$string = <<<LABEL
  h1 {
   color: red;
  }
LABEL;


$string = <<<LABEL
  function jsFunction() {
     // ...
  }
LABEL;


$string = <<<LABEL
  привет
LABEL;
$string = <<<'LABEL'
  привет
LABEL;


//  чтобы не писать множественные переменные, вставим в одну большую переменную называемый массив
$x0 = 23;
$x1 = 45;
$x2 = 67;

$x0 += 1;
echo $x0;

$x1 += 1;
echo $x1;

$x2 += 1;
echo $x2;


// Массив это множественные переменные упаковенные вместе.

// Простой массив
//         0   1   2
$array = [23, 45, 67];

// echo $array[0];
// $array[0] = 24;
// $array[0] += 5;

$publishers = ['Эксмо', 'Лиитрес']; // массив издательства
echo $publishers[0];

$book = [
    'idbook' => 1,
    'title'  => 'Война и Мир',
    'price'  => 1500
];


$menu = [
    ['title' => 'Доставка', 'url' => 'delivery.html'],
    ['title' => 'Доставка самовывоз', 'url' => 'deliverySelf.html'],
];

// Ассоссиативнй массив
$array = ['первый' => 23, 'второй' => 45, 'третий' => 67];

class Car{
  public $color = 'красный';
}
$object = new Car;

$null = null;

// resource - использует функцию для операционной системы
$resource = fopen(__FILE__, 'r');

echo "
Логический тип TRUE или FALSE: $logical <hr />
Целочисленный тип: $integer <hr />
Вещественный тип: $float <hr />
Строковый тип: $string <hr />
Массивы: $array (элемент под ключом 'второй' - " . $array['второй'] .  ")<hr />
Объекты: " . $object->color . "<hr />
Тип NULL: " . $null . "<hr />
Тип ресурс: " . $resource . "<hr />
";