<?php
namespace Specialist\Routing;

use Specialist\Routing\Route;
use Specialist\Routing\RouteDispatcherInterface;

class RouteDispatcher implements RouteDispatcherInterface
{

    public function dispatchRoute(Route $route)
    {
         var_dump($route);
         die;
    }
}