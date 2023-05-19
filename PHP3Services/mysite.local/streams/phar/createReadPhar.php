<?php
// phar.readonly off
$phar = new Phar('myphar.phar');

$phar['test.txt'] = 'test info!';

echo file_get_contents('phar://myphar.phar/test.txt');

// include_once('myphar.phar');
include_once('phar://myphar.phar/test.txt');
?>