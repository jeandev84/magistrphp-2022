<?php
namespace Specialist\Routing;

use Specialist\Routing\Exception\RouteException;

class Route
{

    /**
     * @var array
     */
    protected $methods = [];



    /**
     * @var string
     */
    protected $path;




    /**
     * @var array|callable
     */
    protected $action;




    /**
     * @var array
     */
    protected $matches = [];



    /**
     * @param array $methods
     * @param string $path
     * @param $action
     */
    public function __construct(array $methods, string $path, $action)
    {
        $this->methods = $methods;
        $this->path    = $path;
        $this->action  = $action;
    }



    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path ?: '/';
    }




    /**
     * @return string
     */
    public function getPattern(): string
    {
        return "#^{$this->getPath()}$#i";
    }



    /**
     * @return array
     */
    public function getMethods(): array
    {
        return $this->methods;
    }



    /**
     * @return callable|array
     */
    public function getAction(): callable|array
    {
        return $this->action;
    }




    /**
     * @return array
     */
    public function getMatches(): array
    {
        return $this->matches;
    }




    /**
     * @return bool
     */
    public function callable(): bool
    {
        return is_callable($this->action);
    }




    /**
     * @param string $requestMethod
     * @param string $requestPath
     * @return bool
     */
    public function match(string $requestMethod, string $requestPath): bool
    {
        return $this->matchMethod($requestMethod) && $this->matchPath($requestPath);
    }



//
//      /**
//       * @return false|mixed
//       * @throws RouteException
//      */
//      public function call(): mixed
//      {
//           if (! is_callable($this->action)) {
//                throw new RouteException("Could not call route : {$this->getPath()}");
//           }
//
//           return call_user_func_array($this->action, array_values($this->getMatches()));
//      }




    /**
     * @param string $requestMethod
     * @return bool
     */
    protected function matchMethod(string $requestMethod): bool
    {
        if (! in_array($requestMethod, $this->methods)) {
            return false;
        }

        return true;
    }





    /**
     * @param string $requestPath
     * @return bool
     */
    protected function matchPath(string $requestPath): bool
    {
        if (preg_match($this->getPattern(), $requestPath, $matches)) {
            $this->matches = $matches;
            return true;
        }

        return false;
    }
}