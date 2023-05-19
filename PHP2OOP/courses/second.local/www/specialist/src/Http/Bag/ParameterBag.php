<?php
namespace Specialist\Http\Bag;

class ParameterBag
{

     /**
      * @var array
     */
     protected $parameters = [];



     /**
      * @param array $parameters
     */
     public function __construct(array $parameters = [])
     {
         $this->parameters = $parameters;
     }




     /**
      * @param string $name
      * @param $value
      * @return $this
     */
     public function set(string $name, $value): static
     {
         $this->parameters[$name] = $value;

         return $this;
     }



     /**
      * @param string $name
      * @param $default
      * @return mixed|null
     */
     public function get(string $name, $default = null)
     {
         return $this->parameters[$name] ?? $default;
     }



     /**
      * @param string $name
      * @return bool
     */
     public function has(string $name): bool
     {
          return array_key_exists($name, $this->parameters);
     }




     /**
      * @param string $name
      * @return bool
     */
     public function isEmpty(string $name): bool
     {
          return empty($this->parameters[$name]);
     }



     /**
      * @param string $name
      * @return bool
     */
     public function remove(string $name)
     {
          if (! $this->has($name)) {
              return false;
          }

          unset($this->parameters[$name]);
     }




     /**
      * @param string $name
      * @param $default
      * @return int
     */
     public function getInt(string $name, $default = 0): int
     {
          return (int) $this->get($name, $default);
     }
}