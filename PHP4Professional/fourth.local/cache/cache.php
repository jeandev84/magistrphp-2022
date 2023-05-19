<?php

require __DIR__ . '/autoload.php';

$cache = new \App\Modules\Psr\Cache\CacheItemPool(__DIR__ . '/cache');

# cache : указываем папку куда мы хотим сохранить
$item1 = new \App\Modules\Psr\Cache\CacheItem(1, 'cache');
$item2 = new \App\Modules\Psr\Cache\CacheItem(2, 'cache');


$item1->set('111');
$item2->set('222');

if ($item1->isHit()) {
    echo $item1->get(), "<hr>";
}