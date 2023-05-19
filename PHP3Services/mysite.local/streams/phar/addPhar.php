<?php
$phar = new Phar('my.phar');

$phar->addFile('https://www.specialist.ru', 'specialist.html'); // добавление в phar-архив файла из файловой системы

$phar->addFromString('Специалист', file_get_contents('https://www.specialist.ru')); // добавление в phar-архив файла из строки

$phar = new Phar('my.phar');
$phar->addEmptyDir('tmp/');
//$phar->buildFromDirectory('folder/');

include_once('phar://my.phar/Специалист/');

?>