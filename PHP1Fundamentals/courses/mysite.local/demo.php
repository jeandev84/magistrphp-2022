<?php
/*
function sayHello() {
    echo "<h1>Привет!</h1>";
}

sayHello();
sayHello();
*/


// $userName - формальный параметр
//function sayHello($userName) {
//    echo "<h1>Привет, $userName!</h1>";
//}
//
//// Сергей - Фактический парамер
//sayHello("Сергей");
//sayHello("Костя");
//
//
//function sumTwoNumber($a, $b) {
//    return $a + $b;
//}
//
//// echo sumTwoNumber(3, 5), "\n<br/>" ; //8
//
//
//// Recursion
//function recursion($a) {
//
//    // 3 < 20
//    if ($a < 20) {
//        echo "$a\n";
//        // call recursion with parameter (3 + 1)
//        recursion($a + 1);
//    }
//}
//echo recursion(3);
//
//echo '<hr>';


// Factorial
// !5 = 5 * (5 - 1) * (5 - 2) * (5 - 3) * (5 - 4);
// !5 = 5 * 4 * 3 * 2 * 1;

//todo implements: fixed TZ
//function factorial(int $number) {
//   $result = $number * ($number - 1);
//   if ($number > 1) {
//       factorial($number - 1);
//   } else {
//       return 1;
//   }
//}

// echo factorial(5);


//function sum($a, $b){
//    return $a + $b;
//}
//
//// var_dump(sum(1.5, 2.5)); // 4
//
//function sumIntegers(int $a, int $b){
//    return $a + $b;
//}
//
//// var_dump(sum(1.5, 2.5)); // 3


// Передача параметра по копию
//function test1($k) {
//    $k++;
//    echo "<h2>Test 1 k : $k</h2>";
//}
//
//
//$k = 100;
//test1($k);
//echo $k;
//echo "<h2>Global 1 k : $k</h2>"; // 100
//
//echo '<hr>';
//
//// передача параметра по ссылке
//function test2(&$k) {
//    $k++;
//    echo "<h2>Test 2 k : $k</h2>";
//}
//
//
//
//$k = 100;
//test2($k);
//echo $k;
//echo "<h2>Global 2 k : $k</h2>"; // 101


//
//echo "<pre>";
//print_r(getdate());
//echo "</pre>";

/*
Array
(
    [seconds] => 47
    [minutes] => 29
    [hours] => 20
    [mday] => 8
    [wday] => 6
    [mon] => 4
    [year] => 2023
    [yday] => 97
    [weekday] => Saturday
    [month] => April
    [0] => 1680974987
)
*/


// Cookies
//
//$visitCounter = 0;
//
//if(isset($_COOKIE['visitCounter'])) {
//    $visitCounter = (int)$_COOKIE['visitCounter'];
//}
//
//$visitCounter = $visitCounter + 1;
//setcookie("visitCounter", $visitCounter, time() + 3600);
//
//echo "Visits: $visitCounter";

session_start();

if (isset($_GET['clear'])) {
    session_regenerate_id();
    unset($_SESSION['counter']);
    session_destroy();
    header('Location: /');
    die;
}


echo session_name(), '<hr />';
echo session_id(), '<hr />';

// Счетик
$_SESSION['counter']++;

echo $_SESSION['counter'];

echo '<hr>';
?>

<a href="?clear">Сбросить</a>
