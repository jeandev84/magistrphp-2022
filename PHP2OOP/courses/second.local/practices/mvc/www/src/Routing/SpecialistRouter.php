<?php
namespace Specialist\Routing;

use Specialist\Routing\Exception\NotFoundException;

class SpecialistRouter
{

      /**
       * @var RouteDispatcherInterface
      */
      protected $dispatcher;


      /**
       * @var RouteCollection
      */
      protected $routes;



      /**
       * @param RouteDispatcherInterface $dispatcher
      */
      public function __construct(RouteDispatcherInterface $dispatcher)
      {
           $this->dispatcher = $dispatcher;
           $this->routes     = new RouteCollection();
      }




      /**
       * @param Route $route
       * @return Route
      */
      public function add(Route $route): Route
      {
           return $this->routes->addRoute($route);
      }




      /**
       * @return Route[]
      */
      public function getRoutes(): array
      {
           return $this->routes->getRoutes();
      }



      /**
       * @return RouteCollection
      */
      public function collection(): RouteCollection
      {
          return $this->routes;
      }





      /**
       * @param $methods
       * @param string $uri
       * @param $action
       * @return Route
      */
      public function map($methods, string $uri, $action): Route
      {
           return $this->add(new Route($methods, $uri, $action));
      }




      /**
       * @param string $requestMethod
       * @param string $requestPath
       * @return Route|false
      */
      public function match(string $requestMethod, string $requestPath): Route|bool
      {
           foreach ($this->getRoutes() as $route) {
              if ($route->match($requestMethod, $requestPath)) {
                   return $route;
              }
           }

           return true;
      }



      /**
       * @param string $requestMethod
       * @param string $requestPath
       * @return mixed
       * @throws NotFoundException
      */
      public function dispatch(string $requestMethod, string $requestPath): mixed
      {
           if (! $route = $this->match($requestMethod, $requestPath)) {
               throw new NotFoundException();
           }

           return $this->dispatcher->dispatchRoute($route);
      }
}