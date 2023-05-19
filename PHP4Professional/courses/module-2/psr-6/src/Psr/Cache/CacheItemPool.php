<?php
namespace App\Modules\Psr\Cache;

use App\Modules\Psr\Cache\Item\CacheItemInterface;
use App\Modules\Psr\Cache\Pool\CacheItemPoolInterface;


class CacheItemPool implements CacheItemPoolInterface
{


    /**
     * @param string $cacheDir
    */
    public function __construct(protected string $cacheDir)
    {
          if (! \file_exists($cacheDir)) {
               \mkdir($cacheDir, 0777, true);
          }
    }



    /**
     * @inheritDoc
    */
    public function getItem($key)
    {
        // TODO: Implement getItem() method.
    }

    /**
     * @inheritDoc
     */
    public function getItems(array $keys = array())
    {
        // TODO: Implement getItems() method.
    }

    /**
     * @inheritDoc
     */
    public function hasItem($key)
    {
        // TODO: Implement hasItem() method.
    }

    /**
     * @inheritDoc
     */
    public function clear()
    {
        // TODO: Implement clear() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteItem($key)
    {
        // TODO: Implement deleteItem() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteItems(array $keys)
    {
        // TODO: Implement deleteItems() method.
    }

    /**
     * @inheritDoc
     */
    public function save(CacheItemInterface $item)
    {
        // TODO: Implement save() method.
    }

    /**
     * @inheritDoc
     */
    public function saveDeferred(CacheItemInterface $item)
    {
        // TODO: Implement saveDeferred() method.
    }

    /**
     * @inheritDoc
     */
    public function commit()
    {
        // TODO: Implement commit() method.
    }
}