<?php



/**
 * Пример интерфейс
*/
interface Foo
{
    /**
     * @param array $arr
     * @param int $d
     * @return mixed
    */
    public function someFunc(array $arr = [], int $d = 0);
}


class SomeOtherClass
{

}


/**
 * Пример класс
*/
class Some implements Foo, Iterator, ArrayAccess
{
     const pi = 3.1415;

     private $active = true;
     public static $counter = 1;
     public $test = 'test';


     public function __construct($phoneNumber)
     {
         echo 'Конструктор класса '. __CLASS__."\n";
         echo "$phoneNumber\n";
     }


     /**
      * @inheritDoc
     */
     public function someFunc(array $arr = [], int $d = 0)
     {
          return 'test '. __FUNCTION__. "$d\n";
     }

    /**
     * @inheritDoc
     */
    public function current(): mixed
    {
        // TODO: Implement current() method.
    }

    /**
     * @inheritDoc
     */
    public function next(): void
    {
        // TODO: Implement next() method.
    }

    /**
     * @inheritDoc
     */
    public function key(): mixed
    {
        // TODO: Implement key() method.
    }

    /**
     * @inheritDoc
     */
    public function valid(): bool
    {
        // TODO: Implement valid() method.
    }

    /**
     * @inheritDoc
     */
    public function rewind(): void
    {
        // TODO: Implement rewind() method.
    }

    function bar()
    {
        // TODO: Implement bar() method.
    }

    function baz($longArgument, $longerArgument, $muchLongerArgument)
    {
        // TODO: Implement baz() method.
    }

    function qux($longArgument, $longerArgument, $muchLongerArgument): void
    {
        // TODO: Implement qux() method.
    }

    /**
     * @inheritDoc
     */
    public function offsetExists(mixed $offset): bool
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * @inheritDoc
     */
    public function offsetGet(mixed $offset): mixed
    {
        // TODO: Implement offsetGet() method.
    }

    /**
     * @inheritDoc
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset(mixed $offset): void
    {
        // TODO: Implement offsetUnset() method.
    }
}



function dump($data) {

    if (php_sapi_name() !== 'cli') {
        echo "<pre>";
    }

    var_dump($data);

    if (php_sapi_name() !== 'cli') {
        echo "</pre>";
    }
}


function pretty($data) {

    if (php_sapi_name() !== 'cli') {
        echo "<pre>";
    }

    print_r($data);

    if (php_sapi_name() !== 'cli') {
        echo "</pre>";
    }
    echo "\n";
}
