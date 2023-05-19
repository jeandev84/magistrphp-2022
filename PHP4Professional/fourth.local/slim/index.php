<?php

/**
 * Middleware
 *
 * https://www.slimframework.com/docs/v4/concepts/middleware.html
 *
 * https://www.slimframework.com/docs/v4/objects/routing.html#route-middleware
 *
 * composer require slim/slim:"4.*"
 * composer require slim/psr7
 * composer require nyholm/psr7 nyholm/psr7-server
 * composer require guzzlehttp/psr7 "^2"
 * composer require laminas/laminas-diactoros
*/


use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;

require_once __DIR__.'/../vendor/autoload.php';


$app = AppFactory::create();

/**
 * Example middleware closure
 *
 * @param  ServerRequest  $request PSR-7 request
 * @param  RequestHandler $handler PSR-15 request handler
 *
 * @return Response
 */
$beforeMiddleware = function (Request $request, RequestHandler $handler) {
    $response = $handler->handle($request);
    $existingContent = (string) $response->getBody();


    $response = new Response();
    $response->getBody()->write('BEFORE' . $existingContent);

    return $response;
};

$afterMiddleware = function (Request $request, RequestHandler $handler) {
    $response = $handler->handle($request);
    $response->getBody()->write('AFTER');
    return $response;
};

$app->add($beforeMiddleware);
$app->add($afterMiddleware);

// ...

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('Привет мир!');
    return $response;
});

$app->run();


