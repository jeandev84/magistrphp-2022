<?php

# https://docs.guzzlephp.org/en/stable
# https://docs.guzzlephp.org/en/stable/overview.html#requirements
# https://docs.guzzlephp.org/en/stable/quickstart.html

require __DIR__.'/vendor/autoload.php';


use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://localhost:8000',
    // You can set any number of default request options.
]);


$response = $client->request('GET', '/psr7.php', [
    'query' => [
        'foo' => 'bar'
    ]
]);
echo $response->getStatusCode();
echo "<pre>",
print_r($response->getHeaders());
print_r($response->getHeader('Content-Length')[0]);
echo "<hr>";
echo $response->getBody();
echo "</pre>";