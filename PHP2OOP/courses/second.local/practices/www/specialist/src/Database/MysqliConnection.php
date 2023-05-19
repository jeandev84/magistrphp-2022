<?php
namespace Specialist\Database;

use mysqli;

class MysqliConnection
{

     /**
      * @var mysqli
     */
     protected $connection;


     /**
      * @var mysqli
     */
     protected static $instance;



     /**
      * @param array $config
     */
     public function __construct(array $config)
     {
          $this->connection = $this->make($config);
     }



     /**
      * @param array $config
      * @return mysqli
     */
     public function make(array $config): mysqli
     {
          return new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
     }




     /**
      * @return mysqli
     */
     public function getConnection(): mysqli
     {
          return $this->connection;
     }




     /**
      * @param array $config
      * @return mysqli
     */
     public static function connection(array $config): mysqli
     {
          if (! self::$instance) {
               self::$instance = (new static($config))->getConnection();
          }

          return self::$instance;
     }



     /**
      * @param string $sql
      * @param array $params
      * @return void
     */
     public function statement(string $sql, array $params = [])
     {
         $this->connection->prepare($sql);
     }
}