<?php
namespace App\Modules\Psr\Cache;

use App\Modules\Psr\Cache\Item\CacheItemInterface;


class CacheItem implements CacheItemInterface
{


    /**
     * @param string $key
     * @param string $folder
    */
    public function __construct(protected string $key, protected string $folder)
    {

    }


    /**
     * @inheritDoc
    */
    public function getKey()
    {
        return $this->key;
    }



    /**
     * @inheritDoc
    */
    public function get()
    {
         return file_get_contents($this->folder. '/'. $this->key);
    }



    /**
     * @inheritDoc
    */
    public function isHit()
    {
         return \file_exists($this->folder. '/'. $this->key);
    }



    /**
     * @inheritDoc
    */
    public function set($value): static
    {
         file_put_contents($this->folder. '/'. $this->key, $value);
         return $this;
    }





    /**
     * @inheritDoc
     */
    public function expiresAt($expiration)
    {
        // TODO: Implement expiresAt() method.
    }

    /**
     * @inheritDoc
     */
    public function expiresAfter($time)
    {
        // TODO: Implement expiresAfter() method.
    }
}