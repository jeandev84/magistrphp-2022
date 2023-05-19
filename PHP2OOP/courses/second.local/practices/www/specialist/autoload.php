<?php

require_once __DIR__ . '/composer/AutoLoader.php';


$autoloader = new AutoLoader(realpath(__DIR__ . '/vendor/'));
$autoloader->namespaces([
    'Specialist\\' => 'src/',
    'App\\' => 'app/'
]);

$autoloader->register();



