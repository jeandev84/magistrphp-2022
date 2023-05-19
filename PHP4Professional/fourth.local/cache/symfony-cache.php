<?php
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;

require __DIR__ . '/vendor/autoload.php';

$cache = new FilesystemAdapter('', 0, __DIR__ . '/cache');


// The callable will only be executed on a cache miss.
$value = $cache->get('my_cache_key', function (ItemInterface $item) {
    $item->expiresAfter(3600);

    // ... do some HTTP request or heavy computations
    $computedValue = 'foobar';

    return $computedValue;
});

echo $value; // 'foobar'

// ... and to remove the cache key
// $cache->delete('my_cache_key');


