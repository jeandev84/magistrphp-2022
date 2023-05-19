<?php
namespace Specialist\Routing;

interface RouteDispatcherInterface
{
     /**
      * @param Route $route
      * @return mixed
     */
     public function dispatchRoute(Route $route);
}