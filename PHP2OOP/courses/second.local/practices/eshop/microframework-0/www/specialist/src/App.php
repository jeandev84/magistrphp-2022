<?php
namespace Specialist;

use Error;
use Specialist\Container\Container;
use Specialist\Filesystem\Filesystem;
use Specialist\Http\Request\Request;
use Specialist\Routing\Route;
use Specialist\Routing\Router;
use Specialist\Templating\View;


/**
 * App
*/
class App extends Container
{

    /**
     * @var string
     */
    protected $basePath = '';


    /**
     * @var array
     */
    protected $routes = [];


    /**
     * @param string $basePath
     */
    public function __construct(string $basePath)
    {
        $this->bootstrap($basePath);
    }




    /**
     * @param string $methods
     * @param string $path
     * @param $action
     * @return Route
     */
    public function map(string $methods, string $path, $action): Route
    {
        return $this['router']->map($methods, $path, $action);
    }




    /**
     * @param string $basePath
     * @return $this
     */
    public function setBasePath(string $basePath): static
    {
        $basePath = rtrim($basePath, '\\/');

        $this->bind('path', $basePath);

        $this->basePath = $basePath;

        return $this;
    }




    /**
     * @param string $filename
     * @return $this
    */
    public function loadRoutesFromJsonFile(string $filename): static
    {
         if($jsonRoutes = $this['fs']->get($filename)) {
             $this->routes = json_decode($jsonRoutes, true);
         }

         return $this;
    }




    /**
     * @return string
    */
    public function basePath(): string
    {
        return $this->basePath;
    }




    /**
     * @param string $path
     * @return string
     */
    public function path(string $path = ''): string
    {
        return $this->basePath . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }




    /**
     * @return void
    */
    public function run(): void
    {
        $kernel = new \Specialist\Kernel($this, $this['router']);
        $response = $kernel->handle($request = \Specialist\Http\Request\Request::createFromGlobals());
        $response->send();
        $kernel->terminate($request, $response);
    }




    /**
     * @param string $path
     * @return void
    */
    private function bootstrap(string $path): void
    {
        $this->setBasePath($path);
        $this->bind('fs', new Filesystem($path));
        $this->bind('view', new View($this->path("views")));
        $this->bind('router', new Router());
    }
}