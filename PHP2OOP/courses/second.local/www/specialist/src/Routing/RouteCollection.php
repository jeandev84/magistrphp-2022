<?php
namespace Specialist\Routing;

class RouteCollection
{

     /**
      * @var Route[]
     */
     protected $routes = [];


     /**
      * @param Route $route
      * @return Route
     */
     public function addRoute(Route $route)
     {
         $this->routes[] = $route;

         return $route;
     }




     /**
      * @return Route[]
     */
     public function getRoutes(): array
     {
         return $this->routes;
     }
}