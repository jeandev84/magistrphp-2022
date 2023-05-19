<?php
namespace App;
use App\Controllers\NotFoundController;

class App
{
    private $routes;

    public function __construct(){        
        $jsonRoutes = file_get_contents( $_SERVER['DOCUMENT_ROOT'] . '/config/routes.json');
        $this->routes = json_decode($jsonRoutes, true);
    }
    public function __invoke()
    {
        $controller = '\App\Controllers\NotFoundController';
        $action = 'index';
        $route = $_SERVER['REDIRECT_URL'] ?? '/';

        if(array_key_exists( $route, $this->routes  )){
            list($controller, $action) = explode(':', $this->routes[$route]);
        }

        if (isset( $route ) && !empty( $route )) {
            try{
                (new $controller)->$action();
            }catch(Error $er){
                (new NotFoundController())->index();
                die;
            }  
        }
    }
}