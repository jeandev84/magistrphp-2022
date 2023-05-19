<?php

use Specialist\App;
use Specialist\Http\Request\Request;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


# Начало сессии
session_start();

// Autoloader
require_once __DIR__.'/../vendor/autoload.php';


// Факер (Faker) используется для создании random данных
# https://packagist.org/packages/fakerphp/faker
# composer require fakerphp/faker

$faker = \Faker\Factory::create();

echo $faker->name(), "<hr>";
echo $faker->email(), "<hr>";
echo $faker->text(), "<hr>";



// Создание объект Book
$book = new \App\Entity\Book\Book('PHP10', 3000);

dump($book);



# Установить Monolog и созадать его экземпляр
# https://packagist.org/packages/monolog/monolog
# composer require monolog/monolog
# Монолог используется для логирования ошибок

$log = new Logger('name');
$log->pushHandler(new StreamHandler(__DIR__.'/../var/log/dev.log', Level::Warning));
$log->warning('Foo');
$log->error('Bar');



# PHPUnit
# https://packagist.org/packages/phpunit/phpunit
# composer require --dev phpunit/phpunit ^9
# docs : https://phpunit.de/getting-started/phpunit-9.html
# php ./vendor/bin/phpunit
# php ./vendor/bin/phpunit tests
# php ./vendor/bin/phpunit --bootstrap "../autoload.php" tests
# "./vendor/bin/phpunit" tests
# "./vendor/bin/phpunit" tests/src/Entity/Book/BookTest.php
/*
PHPUnit 9.6.6 by Sebastian Bergmann and contributors.

....                                                                4 / 4 (100%)

Time: 00:00.008, Memory: 6.00 MB

OK (4 tests, 4 assertions)
*/

# PHP PHAR
# https://www.php.net/manual/fr/book.phar.php


// Run Application
$app = new App(realpath(__DIR__.'/../'));
$app->run();

