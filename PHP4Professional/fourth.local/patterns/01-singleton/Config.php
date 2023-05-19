<?php


/**
 * Пример реализации singleton
*/
class Config
{

     /**
      * @var null
     */
     private static $instance = null;


     /**
      * @var array
     */
     protected array $parameters = [];


     private function __construct() {}

     public static function getInstance(): static
     {
          if (empty(static::$instance)) {
              static::$instance = new static();
          }

          return static::$instance;
     }


    /**
     * @param string $name
     * @param $value
     * @return $this
     */
    public function setParameter(string $name, $value): static
    {
        $this->parameters[$name] = $value;

        return $this;
    }



    /**
     * @param string $name
     * @return bool
     */
    public function hasParameter(string $name): bool
    {
        return isset($this->parameters[$name]);
    }



    /**
     * @param string $name
     * @param $default
     * @return mixed
     */
    public function getParameter(string $name, $default = null): mixed
    {
        return $this->parameters[$name] ?? $default;
    }



    /**
     * @return array
    */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}


$config1 = Config::getInstance();
$config2 = Config::getInstance();
// echo $config1 === $config2;

$config1->setParameter('foo', 123);
echo $config2->getParameter('foo');


$config2->setParameter('foo', 123);
echo $config1->getParameter('foo');