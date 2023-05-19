<?php

$array = [23, 45, 67];
$length = count($array);
for($i = 0; $i < $length; $i++){
  echo "\$array[$i] = ", $array{$i}  ,"<hr />";
}
