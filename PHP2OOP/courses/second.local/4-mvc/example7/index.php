<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/mysqli.php';

session_start();

$app = new \App\App;
$app();

