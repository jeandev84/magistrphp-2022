<?php

# https://docs.guzzlephp.org/en/stable
# https://docs.guzzlephp.org/en/stable/overview.html#requirements
# https://docs.guzzlephp.org/en/stable/quickstart.html

require __DIR__ . '/vendor/autoload.php';


use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('POST', 'http://localhost:8000/test.php', [
    'json' => ['foo' => 'bar']
]);

echo $response->getBody();
echo "<hr/>";
echo $response->getStatusCode();


/*
Создать файл test.php, который будет проверять запрос и если он отправлен
методом POST, to test.php должен отправить Content-Type: application/json и ответить JSON-файлом.

Создать guzzle_json.php, в котором методом POST отправляется JSON данные.

https://docs.guzzlephp.org/en/stable/quickstart.html#uploading-data
*/