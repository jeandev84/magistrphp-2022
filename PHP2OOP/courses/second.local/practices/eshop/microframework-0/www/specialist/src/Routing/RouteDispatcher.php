<?php
namespace Specialist\Routing;

use Specialist\Routing\Exception\RouteException;


class RouteDispatcher implements RouteDispatcherInterface
{



    /**
     * @param Route $route
     * @return mixed
     * @throws RouteException
    */
    public function dispatchRoute(Route $route): mixed
    {
         if (! $route->callable()) {
             throw new RouteException("Could not call route : {$route->getPath()}");
         }

         return call_user_func_array($route->getAction(), array_values($route->getMatches()));
    }
}