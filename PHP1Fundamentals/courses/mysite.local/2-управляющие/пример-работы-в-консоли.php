<?php
#php пример-работы-в-консоли.php названиефайла
#php пример-работы-в-консоли.php пример-работы-в-консоли.php

print_r( $argv );

echo "Проверяем наличие файла '{$argv[1]}'\r\n";

for($i = 0; $i < 30; $i++){
  time_nanosleep(0, 100000000); echo '.';
}
echo ". \r\n";

if( file_exists($argv[1]) ){
  echo "Файл {$argv[1]} существует!\r\n";
  // readfile($argv[1]);
} else {
  echo "Файл '{$argv[1]}' не существует!\r\n";
}
