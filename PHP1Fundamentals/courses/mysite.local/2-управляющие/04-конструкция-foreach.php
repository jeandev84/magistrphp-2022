<?php

$array = ['первый' => 23, 'второй' => 45, 'третий' => 67];
foreach($array as $value){
  echo $value, '<hr />';
}

foreach($array as $key => $value){
  echo "$key = $value<hr />";
}

foreach($array as $key => $value){
  $value += 10;
  echo "$value<hr />";
}
echo "<pre>",print_r($array),"</pre>";

// foreach($array as $key => &$value){
//   $value += 10;
//   echo "$value<hr />";
// }
// echo "<pre>",print_r($array),"</pre>";