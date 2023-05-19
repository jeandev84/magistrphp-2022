<?php
namespace App\Modules\Psr\Cache\Exception;


/**
 * Exception interface for invalid cache arguments.
 *
 * Any time an invalid argument is passed into a method it must throw an
 * exception class which implements Psr\Cache\InvalidArgumentException.
 *
 * https://www.php-fig.org/psr/psr-6/
*/
interface InvalidArgumentException extends CacheException
{

}