<?php
//Парсинг  токена
use Lcobucci\JWT\Parser;

require '../vendor/autoload.php';


$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImp0aSI6IjRmMWcyM2ExMmFhIn0.eyJpc3MiOiJodHRwOlwvXC90ZXN0LnRlc3QiLCJhdWQiOiJodHRwOlwvXC90ZXN0LnRlc3QiLCJqdGkiOiI0ZjFnMjNhMTJhYSIsImlhdCI6MTYxMTg1OTEzNiwibmJmIjoxNjExODU5MTk2LCJleHAiOjE2MTE4NjI3MzYsInVpZCI6MX0.eKLFy334pw71Bsd5JYIU74F4fb93WWPO3eeltSIfblc';

$token = (new Parser())->parse((string) $token); // разбор строки

$headers = $token->getHeaders(); // получаем заголовки токена
echo '<pre>', print_r($headers),'</pre>';

$claims = $token->getClaims(); // получаем данные токена
echo '<pre>', print_r($claims),'</pre>';

echo $token->getHeader('jti'), '<hr>';
echo $token->getClaim('iss'), '<hr>';
echo $token->getClaim('uid'), '<hr>';


?>