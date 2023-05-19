<?php

//пример математических функций
echo base_convert("ffffff",16,10);
$t = 36.6;
echo ceil($t),"<br>";
echo floor($t),"<br>";
echo round($t),"<br>";
echo round($t,1),"<br>";
echo max(34,56,100),"<br>";
echo max([34,56,100]),"<br>";
echo min([34,56,100]),"<br>";

//пример строковых функций
echo str_repeat("тынц-",4),"<br>";
$str = "   john   ";
echo "<pre>'",chop($str),"'<br>";
echo "'",ltrim($str),"'<br>";
echo "'",rtrim($str),"'<br>";
echo "'",trim($str),"'</pre><br>";

echo "<pre>",print_r(explode(" ","Ехал Грека через")), "</pre>";
explode("/",__DIR__);
echo "<ul><li>",implode("<li>",[45,67,100]),"</ul>";

echo md5("qwerty"."#kjhf&#");
print "привет";
$goods = "apples";
$num   = 5;
printf("%s %d",$goods,$num);

$csv = "'col,1','col2','col3'";
$csv = str_getcsv($csv,',',"'");
echo "<pre>",print_r($csv),"</pre>";

$str = "Ехал Грека через реку";
$str = str_replace('е','<mark>e</mark>',$str);
echo "<pre>",$str,"</pre>";


// strip_tags удаляет все html tags из строки, получим чистый текст
$str = "Ехал <b>Грека</b> <mark>через</mark> реку";
$str = strip_tags($str,'<mark>');
echo "<pre>",$str,"</pre>";

$str = "Ехал Грека через реку";
echo strpos($str,"ре", 2),"<br>";
echo strpos($str,"ре", 12),"<br>";


$str = "Ехал Грека через реку";
echo substr_count($str,"ре",0,strlen($str)),"<br>";

$str = "Hello world!";
echo substr($str,2,7),"<br>";

//пример функций для работы с массивами

$arr = [12,45,12,67,12,67,100];
echo "<pre>";
print_r(array_count_values($arr));
echo "</pre>";

$arr = [12,45,12,40=>67,12,67,100];
echo "<pre>";
print_r(array_values($arr));
print_r(array_keys($arr));
echo "</pre>";

$arr = [12,45];
echo "<pre>";
echo array_pop($arr),"<br>";
echo array_push($arr,100),"<br>";
echo array_shift($arr),"<br>";
echo array_unshift($arr,500,400),"<br>";
print_r($arr);
echo "</pre>";

$arr = [12,45];
echo "<pre>";
echo in_array(12,$arr),"<br>";
print_r($arr);
echo "</pre>";

function mysort($a,$b){
  return $a < $b ? 1 : -1;
}
$arr = [12,45,23,100,1];
echo "<pre>";
usort($arr,'mysort');
print_r($arr);
echo "</pre>";

//функций для работы с датой и временем
echo time(),"<hr>"; // ms с 1 ого января 1979 г
echo date("d-m-Y H:i:s"),"<hr>";
echo date("m/d/Y"),"<hr>";
echo date("d-m-Y H:i:s",1612580958),"<hr>";

// Hours, minutes, seconds, months, days, year
echo mktime(20,23,12,12,6,17),"<hr>";
echo "<pre>";
print_r(getdate());
echo "</pre>";

/*
Array
(
    [seconds] => 47
    [minutes] => 29
    [hours] => 20
    [mday] => 8
    [wday] => 6 // порядка номер день недели
    [mon] => 4
    [year] => 2023
    [yday] => 97
    [weekday] => Saturday
    [month] => April
    [0] => 1680974987
)
*/

echo getdate()['year']; // 2023
echo getdate()['wday']; // 6


// если день недели понедельник
if (getdate()['wday'] == 1) {
    // создадим отчёт какой-нибудь
}


// Лабораторная задача:
// Практическая N3.1: Создание собственных функций
// Практическая N3.2: Использование встроенных функций
