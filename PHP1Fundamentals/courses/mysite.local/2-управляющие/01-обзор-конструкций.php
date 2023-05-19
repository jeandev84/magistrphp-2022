<?php

if( true ) {
  echo 'Если true, печатаем это';
} else {
  echo 'Иначе, печатаем это';
}

echo '<hr />';

echo true ? 'Истина' : 'Ложь';

echo '<hr />';

for($i = 0; $i < 5; $i++){
  echo $i, " - ";
}
echo '<hr />';

$i = 0;
while($i < 5){
  echo $i, " - ";
  $i++;
}
echo '<hr />';

$i = 0;
while($i < 5){
  echo $i, " - ";
  $i++;
}
echo '<hr />';

//если подключаемый файл отсутствует
//будет ошибка
include 'test.php';

echo '<hr />';

// list($first, $second) = ['первый',2];
list($first, $second) = array('первый',2);
echo "$first, $second";

echo '<hr />';

//опасная конструкция
eval( 'echo "Привет!";' );