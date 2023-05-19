<?php

//возврат нескольких значений
function getArray()
{
    return [0, 1, 2];
}


// list() на чистым пхп
$arr  = getArray();
$zero = $arr[0];
$one  = $arr[1];
$two  = $arr[2];

echo $arr[0], $arr[1], $arr[2], '<br>';



list ($zero, $one, $two) = getArray();
echo "$zero, $one, $two<hr/>";


//объявление возвращаемого типа
function sum($a, $b): float {
  return $a + $b;
}
// будет возвращаться значение типа float
var_dump(sum(1, 2));
echo "<hr/>";



//Объявление обнуляемого типа
// ?item=100
function get_item(): ?string {
  if (isset($_GET['item'])) {
      return $_GET['item'];
  } else {
      return null;
  }
}
echo get_item();



//возврат по ссылке
//примечание: может пригодится потом в ООП
function &returns_reference()
{
  $someref = 'Returns reference';
  return $someref;
}

$newref =& returns_reference();


//обращение к функции через переменные
$func = 'sum';
echo $func(6,10), "<br/>";   // вызывает функцию sum()


function multi($a, $b) {
     return $a * $b;
}


function divide($a, $b) {
    return $a / $b;
}


// $f  = 'multi';
$f1 = 'divide';


function printMyFunc(callable $func) {
   echo $func(2, 5), '<br>';
}

// printMyFunc($f);
printMyFunc('multi');
printMyFunc($f1);

printMyFunc(function ($a, $b) {
     return $a * $b;
});


printMyFunc(fn($a, $b) => $a * $b);


//стрелочные функции >=7.4
// $y = 1;
 
// $fn1 = fn($x) => $x + $y;
// $fn2 = function ($x) use ($y) {
//     return $x + $y;
// };
// echo  $fn1(3), "<hr/>";
// echo  $fn2(3), "<hr/>";