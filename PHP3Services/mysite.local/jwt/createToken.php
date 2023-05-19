<?php
//Создание  токена
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

require '../vendor/autoload.php';

$signer = new Sha256();

$token = (new Builder())
	->setIssuer('http://test.test') // Настраиваем издателя (iss)
	->setAudience('http://test.test') // Настраиваем аудиторию/получателя (aud)
	->setId('4f1g23a12aa', true) // Уникальный идентификатор токена (jti), реплицируемый как элемент заголовка
	->setIssuedAt(time()) // время создание токена в формате Unix-time (jat)
	->setNotBefore(time() + 60) // время когда токен станет валидным (nbf)
	->setExpiration(time() + 3600) //срок действия токена (exp)
	->set('uid', 1) // дополнительный параметр (claim) 'uid'
	->sign($signer, 'testing')
	->getToken(); // получаем созданный токен
	
$headers = $token->getHeaders(); //получаем заголовки токена
echo '<pre>', print_r($headers),'</pre>';

$claims = $token->getClaims(); // получаем данные токена
echo '<pre>', print_r($claims),'</pre>';

echo $token->getHeader('jti'), '<hr>';
echo $token->getClaim('iss'), '<hr>';
echo $token->getClaim('uid'), '<hr>';
echo $token;	




?>