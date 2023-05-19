<?php
namespace Specialist\Container;

class Container implements \ArrayAccess
{

    /**
     * @var array
    */
    protected $bindings = [];


    /**
     * @var array
    */
    protected $instances = [];




    /**
     * @var array
    */
    protected $aliases = [];



    /**
     * @param string $name
     * @param $value
     * @param bool $shared
     * @return $this
    */
    public function bind(string $name, $value, bool $shared = false): static
    {
        $this->bindings[$name] = $value;

        return $this;
    }





    /**
     * @param string $name
     * @return mixed|null
    */
    public function get(string $name)
    {
        if (! $this->has($name)) {
            return null;
        }

        return $this->bindings[$name];
    }




     /**
      * @param string $name
      * @return bool
     */
     public function has(string $name): bool
     {
        return array_key_exists($name, $this->bindings);
     }



     public function offsetExists(mixed $offset)
     {
         return $this->has($offset);
     }



     public function offsetGet(mixed $offset)
     {
         return $this->get($offset);
     }



     public function offsetSet(mixed $offset, mixed $value)
     {
        $this->bind($offset, $value);
     }



     public function offsetUnset(mixed $offset)
     {
         unset($this->bindings[$offset]);
     }
}