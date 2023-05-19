<?php

use Specialist\App;
use Specialist\Http\Request\Request;

session_start();

// Autoloader
require_once __DIR__.'/../vendor/autoload.php';


// Run Application
$app = new App(realpath(__DIR__.'/../'));
$app->run();

$controller = new \App\Http\Controllers\FrontController();
