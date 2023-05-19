<?php

# https://docs.guzzlephp.org/en/stable
# https://docs.guzzlephp.org/en/stable/overview.html#requirements
# https://docs.guzzlephp.org/en/stable/quickstart.html

require __DIR__ . '/vendor/autoload.php';


use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('POST', 'http://localhost:8000/upload.php', [
    /*
   'form_params' => [
       'field_name' => 'abc',
       'other_field' => '123',
       'nested_field' => [
           'nested' => 'hello'
       ]
   ]
   */
   'multipart' => [ // MultipartStream
      [
          'name' => 'myfile',
          //'contents' => '123',
          'contents' => fopen(__DIR__.'/readme.html', 'r'),
          'filename' => 'readme.html'
      ]
   ]
]);


/*
Создать файл test.php, который будет проверять запрос и если он отправлен
методом POST, to test.php должен отправить Content-Type: application/json и ответить JSON-файлом.

Создать guzzle_json.php, в котором методом POST отправляется JSON данные.

https://docs.guzzlephp.org/en/stable/quickstart.html#uploading-data
*/