<?php
namespace Specialist;

use Error;
use Specialist\Http\Request\Request;
use Specialist\Routing\Router;
use Specialist\Templating\View;


/**
 * App
*/
class App implements \ArrayAccess
{


     /**
      * @var Router
     */
     protected $router;



     /**
      * @var View
     */
     protected $view;



     /**
      * @var array
     */
     protected $bindings = [];




     /**
      * @param string $root
     */
     public function __construct(string $root)
     {
          $this->bind('root', $root);
          $this->bind('view', new View("$root/templates/"));
     }




     /**
      * @param string $name
      * @param $value
      * @return $this
     */
     public function bind(string $name, $value): static
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





     /**
      * @return mixed|null
     */
     public function path()
     {
          return $this->get('root');
     }






     /**
      * @return void
     */
     public function run(): void
     {
         $controller = new Controller();

         if (!empty($_GET['action'])) {

             try{

                 $action = $_GET['action'];
                 echo $controller->{$action}();

             }catch(Error $er){
                 echo "<h1>404</h1>";
                 die;
             }
         }
     }


     public function __invoke()
     {
         $this->run();
     }


    public function bootKernel()
     {
         $kernel = new Kernel($this);
         $response = $kernel->handle($request = Request::createFromGlobals());
         $response->send();
         $kernel->terminate($request, $response);
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