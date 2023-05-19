<?php
#php пример-работы-в-консоли.php Вася программист

print_r( $argv );

echo "Здравствуйте {$argv[1]}! \r\nВы {$argv[2]}?\r\n";

sleep(1); echo '.';
sleep(1); echo '.';
sleep(1); echo ". \r\n";

echo "В имени символов " . mb_strlen($argv[1]) . "\r\n";