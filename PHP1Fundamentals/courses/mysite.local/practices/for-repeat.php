<?php

//
//
////echo '<hr>';
////
////for($i = 100; $i > 0; $i--){
////    echo "$i <br />";
////}
////
////echo '<hr>';
////
////for($i = 100; $i > 0; $i = $i - 7){
////    echo "$i <br />";
////}
////
////echo '<hr>';
////
////for($i = 100; $i > 0; $i -=3){
////    echo "$i <br />";
////}
//
//echo '<hr>';
//
//for($i = 1; $i <= 5; $i++){
//    if ($i == 2) continue;
//    echo "$i <hr />";
//}
//
//
//echo '<hr>';
//
//for($i = 1; $i <= 5; $i++){
//    if ($i == 2) continue;
//    if ($i == 4) break;
//    echo "$i <hr />";
//}


// ДЗ
// Ввести
// 1 2 3 4 .. 10
// 2 4 6 8 .. 20
/*
for ($i = 1; $i <= 10; $i++) {
     echo "$i <br>";
     for ($j = 1; $j <= 20; $j += 2) {
         echo "$j <br>";
     }
}
*/


//// Вывод таблицы
//echo '<table border="1">';
//for ($i = 1; $i <= 10; $i++) {
//    echo '<tr>';
//    for ($j = 1; $j <= 10; $j++) {
//        echo '<td>';
//        echo $i * $j;
//        echo '</td>';
//    }
//    echo '<tr>';
//}
//
//echo '</table>';
//
//echo '<hr>';
//
//// Вывод таблицы по заданному размеру
//
//$rows = 7;
//$cols = 8;
//
//
//echo '<table border="1">';
//for ($i = 1; $i <= $rows; $i++) {
//    echo '<tr>';
//    for ($j = 1; $j <= $cols; $j++) {
//        echo '<td>';
//        echo $i * $j;
//        echo '</td>';
//    }
//    echo '<tr>';
//}
//
//echo '</table>';
//
//echo '<hr>';
//
//// Вывод таблицы покрашена задана цвета
//
//$rows = 15;
//$cols = 15;
//
//
//echo '<table border="1">';
//for ($i = 1; $i <= $rows; $i++) {
//    echo '<tr>';
//    for ($j = 1; $j <= $cols; $j++) {
//
//        if ($j == 1) {
//            echo '<td style="background: red;">';
//        } else {
//            echo '<td>';
//        }
//
//        echo $i * $j;
//        echo '</td>';
//    }
//    echo '<tr>';
//}
//
//echo '<hr>';

$a = 2;

while ($a < 1000) {
    echo $a, "<br>";
    $a *= 2; // $a = $a * 2;
}




?>

<!--
<table>
    <tr>
        <td>1x1</td>
        <td>1x2</td>
        <td>1x3</td>
    </tr>
    <tr>
        <td>2x1</td>
        <td>2x2</td>
        <td>2x3</td>
    </tr>
    <tr>
        <td>3x1</td>
        <td>3x2</td>
        <td>3x3</td>
    </tr>

    ...
</table>
-->