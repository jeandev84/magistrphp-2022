<?php

/**
 * Создать класс Request - Singleton, у которого будут методы getPost($name), getQuery($name), getCookie($name)
 * эти методы должны возвращать значение параметра по его названию
 *
 * $request = Request::getInstance();
 * echo $request->getQuery('foo'); http://mysite.local/?foo=123
*/
class Request
{

     private static $instance;


     /**
      * @param array $query
      * @param array $post
      * @param array $cookies
     */
     private function __construct(protected array $query, protected array $post, protected array $cookies)
     {
     }


     public static function getInstance()
     {
          if (empty(self::$instance)) {
              self::$instance = new static($_GET, $_POST, $_COOKIE);
          }
     }


     /**
      * @param $name
      * @return mixed
     */
     public function getQuery($name): mixed
     {
         return $this->query[$name] ?? null;
     }



     /**
      * @param $name
      * @return mixed
     */
     public function getPost($name):  mixed
     {
          return $this->post[$name] ?? null;
     }


     public function getCookie($name)
     {
          return $this->cookies[$name] ?? null;
     }



     /**
      * @return array
     */
     public function getCookies(): array
     {
         return $this->cookies;
     }
}