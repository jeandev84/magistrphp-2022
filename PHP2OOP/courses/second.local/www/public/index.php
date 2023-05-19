<?php
use Specialist\App;
use Specialist\Filesystem\Filesystem;
use Specialist\Templating\View;


require_once __DIR__.'/../vendor/autoload.php';


/**
 * Start session
*/
session_start();


if (empty($_SESSION['basket'])) {
   $_SESSION['basket'] = [];
}


/**
 * Configuration
*/
$config = require_once __DIR__.'/../config/app.php';



/**
 * Initial application
*/

$app = new App($config);



/**
 * Registration routes
*/
$app->map('GET', '/', [\App\Controllers\CatalogController::class, 'index']);
$app->map('GET', '/basket', [\App\Controllers\BasketController::class, 'index']);
$app->map('GET', '/basket/add', [\App\Controllers\BasketController::class, 'add']);
$app->map('GET', '/basket/delete', [\App\Controllers\BasketController::class, 'delete']);
$app->map('GET', '/book', [\App\Controllers\BookController::class, 'index']);
$app->map('GET|POST', '/book/create', [\App\Controllers\BookController::class, 'create']);
$app->map('GET', '/order', [\App\Controllers\OrderController::class, 'index']);



/**
 * Run application
*/
$app->run();

