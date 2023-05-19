<?php
namespace Specialist\Routing;

interface RouterInterface
{

    /**
     * @param string $requestMethod
     * @param string $requestPath
     * @return mixed
    */
    public function match(string $requestMethod, string $requestPath);




    /**
     * @return mixed
    */
    public function getRoutes();
}