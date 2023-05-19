<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/mysqli.php';

session_start();

if( empty($_SESSION['basket']) )
{
  $_SESSION['basket'] = [];
}

$app = new \App\App;
$app();

