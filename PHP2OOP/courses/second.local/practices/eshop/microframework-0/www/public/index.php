<?php
use Specialist\App;
use Specialist\Filesystem\Filesystem;
use Specialist\Templating\View;


require_once __DIR__.'/../vendor/autoload.php';


/**
 * Start session
*/
session_start();



/**
 * Initial application
*/

$app = new App(realpath(__DIR__.'/../'));


/**
 * Registration routes
*/
$app->map('GET', '/', [\App\Controller\CatalogController::class, 'index']);
$app->map('GET', '/basket', [\App\Controller\BasketController::class, 'index']);
$app->map('GET', '/book', [\App\Controller\BookController::class, 'index']);
$app->map('POST', '/book/create', [\App\Controller\BookController::class, 'create']);
$app->map('GET', '/order', [\App\Controller\OrderController::class, 'index']);



/**
 * Run application
*/
$app->run();

