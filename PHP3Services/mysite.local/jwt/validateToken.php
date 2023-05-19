<?php
//Проверка  токена
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Parser;

require '../vendor/autoload.php';


$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImp0aSI6IjRmMWcyM2ExMmFhIn0.eyJpc3MiOiJodHRwOlwvXC90ZXN0LnRlc3QiLCJhdWQiOiJodHRwOlwvXC90ZXN0LnRlc3QiLCJqdGkiOiI0ZjFnMjNhMTJhYSIsImlhdCI6MTYxMTg1OTEzNiwibmJmIjoxNjExODU5MTk2LCJleHAiOjE2MTE4NjI3MzYsInVpZCI6MX0.eKLFy334pw71Bsd5JYIU74F4fb93WWPO3eeltSIfblc';

$token = (new Parser())->parse((string) $token); // разбор строки

$data = new ValidationData(); // использует текущее время для проверки iat, nbf и exp
$data->setIssuer('http://test.test');
$data->setAudience('http://test.test');
$data->setId('4f1g23a12aa');

var_dump($token->validate($data));

//$data->setCurrentTime(time() + 60);
//var_dump($token->validate($data));

//$data->setCurrentTime(time() + 4000);
//var_dump($token->validate($data));


?>