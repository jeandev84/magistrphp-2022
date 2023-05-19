<?php
namespace Specialist\Routing;


use Specialist\Routing\Exception\NotFoundException;
use Specialist\Routing\Exception\RouteException;


class Router implements RouterInterface
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
       * @param RouteDispatcherInterface|null $dispatcher
      */
      public function __construct(RouteDispatcherInterface $dispatcher = null)
      {
           $this->dispatcher = $dispatcher ?: new RouteDispatcher();
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
       * @param string $methods
       * @param string $uri
       * @param $action
       * @return Route
      */
      public function map(string $methods, string $uri, $action): Route
      {
           return $this->add(new Route($this->resolveMethods($methods), $this->resolvePath($uri), $action));
      }




      /**
       * @param string $uri
       * @param $action
       * @return Route
      */
      public function get(string $uri, $action)
      {
           return $this->map('GET', $uri, $action);
      }




      /**
       * @param string $uri
       * @param $action
       * @return Route
      */
      public function post(string $uri, $action): Route
      {
          return $this->map('GET', $uri, $action);
      }





      /**
       * @inheritDoc
       * @return Route|false
      */
      public function match(string $requestMethod, string $requestPath): Route|bool
      {
           foreach ($this->getRoutes() as $route) {
              if ($route->match($requestMethod, $requestPath)) {
                   return $route;
              }
           }

           return false;
      }




     /**
      * @param string $requestMethod
      * @param string $requestPath
      * @return mixed
      * @throws RouteException
      * @throws NotFoundException
      */
      public function dispatch(string $requestMethod, string $requestPath): mixed
      {
           if (! $route = $this->match($requestMethod, $requestPath)) {
               throw new NotFoundException();
           }

           return $this->dispatcher->dispatchRoute($route);
      }




      /**
       * @param $methods
       * @return array
      */
      protected function resolveMethods($methods): array
      {
           return explode('|', $methods);
      }




      /**
       * @param string $path
       * @return string
      */
      protected function resolvePath(string $path): string
      {
           return trim($path, '/');
      }
}