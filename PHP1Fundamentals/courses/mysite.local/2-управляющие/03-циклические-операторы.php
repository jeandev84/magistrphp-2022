<?php

// Цыкл под условием (for)
// Используется: Если когда знаем количество попытки цыкл
// 0, 1, 2, 3, 4, 5
for($i = 0; $i < 5; $i++){
  echo "$i <hr />";
}


// 5, 4, 3, 2, 1
for($i = 5; $i > 0; $i--){
    echo "$i <hr />";
}

// 1, 2, 3, 4
for($i = 1; $i < 5; $i++){
    echo "$i <hr />";
}

// for($i = 0; $i < 5; $i++):
//   echo "$i <hr />";
// endfor;


// считать шаг по шаг (шаг = 3) по возврасту
for($i = 100; $i > 0; $i = $i - 3){
    echo "$i <hr />";
}

for($i = 100; $i > 0; $i -= 3){
    echo "$i <hr />";
}



// Break (Преревает текущий цыкл и вообще весь цыкл: немнедлено остановливает цыкла)
// 1
// break : значит если у нас порядка номера равно в нашем случае 2 -ум, то мы остановливаем итерацию
for($i = 1; $i <= 5; $i++){
    if ($i == 2) break;
    echo "$i <hr />";
}


// Continue (Преревает текущий цыкл но не преревает весь цыкл)
// 1, 3, 4
// Фактический мы пропускаем 2 -ку
// continue : значит если у нас порядка номера равно в нашем случае 2 -ум, то мы пропускаем и идем в следующую итерацию
for($i = 1; $i <= 5; $i++){
    if ($i == 2) continue;
    echo "$i <hr />";
}



echo '<hr>';

// 1, 3
for($i = 1; $i <= 5; $i++){
    if ($i == 2) continue;
    if ($i == 4) break;
    echo "$i <hr />";
}


//// Вложенные цыкл например HTML таблица
// Вывод таблицы
echo '<table border="1">';
for ($i = 1; $i <= 10; $i++) {
    echo '<tr>';
    for ($j = 1; $j <= 10; $j++) {
        echo '<td>';
        echo $i * $j;
        echo '</td>';
    }
    echo '<tr>';
}

echo '</table>';
echo '<hr>';

// Вывод таблицы по заданному размеру

$rows = 7;
$cols = 8;


echo '<table border="1">';
for ($i = 1; $i <= $rows; $i++) {
    echo '<tr>';
    for ($j = 1; $j <= $cols; $j++) {
        echo '<td>';
        echo $i * $j;
        echo '</td>';
    }
    echo '<tr>';
}

echo '</table>';
echo '<hr>';

// Вывод таблицы покрашена задана цвета

$rows = 15;
$cols = 15;


echo '<table border="1">';
for ($i = 1; $i <= $rows; $i++) {
    echo '<tr>';
    for ($j = 1; $j <= $cols; $j++) {

        if ($j == 1) {
            echo '<td style="background: red;">';
        } else {
            echo '<td>';
        }

        echo $i * $j;
        echo '</td>';
    }
    echo '<tr>';
}



// Цыкл перед условием (while)
// Вывести на экран до тех пора пока $a меньше 1000
// условия проверяется перед каждой итерации
// Используется: Если мы не знаем если одно условие будет выполняется.
$a = 2;

while ($a < 1000) {
   echo $a, "<br>";
   $a *= 2; // $a = $a * 2;
}


$a = 2000;

while ($a < 1000) {
    echo $a, "<br>";
    $a *= 2; // $a = $a * 2;
}



// Цыкл со под условиям
// Выводим на экран пока $a < 1000
// условия проверяется после каждой итерации
// Используется: Если мы знаем хотя бы одно условие гарантировано будет выполняется.
$a = 2;

do {
    echo $a, "<br>";
    $a *= 2; // $a = $a * 2;
} while ($a < 1000);



// Цыкл специально назначено для переборки массива
// Массив - это множественные переменные упокованные в одну
// порядка индексации массив идёт от 0 до бесконечного: 0 1 2 3 ...n

$items = ['Иван', 'Екатерина', 'Николай'];

//echo $items[0];
//echo $items[1];
//echo $items[2];

//for ($i = 0; $i < count($items); $i++) {
//    echo $items[$i], "<br>";
//}


foreach ($items as $name) {
   echo $name, "<hr>";
}


$menu = [
   'index.php' => 'Главная',
   'contacts.php' => 'Контакты',
   'basket.php' => 'Корзина',
];

foreach ($menu as $title) {
    echo $title, "<br/>";
}

foreach ($menu as $url => $title) {
    echo "<a href='$url'>$title</a>", "<br>";
    echo '<a href="'. $url .'">'. $title .'</a>', "<br>";
    echo sprintf('<a href="%s">%s</a><br>', $url, $title);
}



// Цыкли
$k = 0;
$str = '';
while($k < 5){
  $str .= "$k - ";
  $k++;
}
echo $str, '<hr />';

// $k = 0;
// $str = '';
// while($k < 5):
//   $str .= "$k - ";
//   $k++;
// endwhile;
// echo $str, '<hr />';

$str = 'Hello, world!';
$j = 0;
do{
  echo $str[$j], ',';
  $j++;
}while($j < strlen($str));
echo '<hr />';


// $str = 'Привет, мир!';
// $j = 0;
// do{
//   echo mb_substr($str, $j, 1), ',';
//   $j++;
// }while($j < mb_strlen($str));
// echo '<hr />';



$items = ['Иван', 'Екатерина', 'Николай'];
foreach($items as $item){
  echo $item, '<hr />';
}

// foreach($items as $item):
//   echo $item, '<hr />';
// endforeach;