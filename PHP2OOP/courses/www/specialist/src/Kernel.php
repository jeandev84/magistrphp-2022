<?php
namespace Specialist;

use App\Http\Controllers\FrontController;
use Exception;
use Specialist\Http\Request\Request;
use Specialist\Http\Response\JsonResponse;
use Specialist\Http\Response\Response;
use Specialist\Routing\Exception\NotFoundException;
use Specialist\Routing\Router;
use Specialist\Templating\View;

class Kernel
{


       /**
        * @var App
      */
      protected $app;




      /**
       * @var Router
      */
      protected $router;




      /**
       * @param App $app
       * @param Router $router
      */
      public function __construct(App $app, Router $router)
      {
           $this->loadHelpers();
           $this->app    = $app;
           $this->router = $router;
      }





      /**
       * @param Request $request
       * @return Response
      */
      public function handle(Request $request): Response
      {
          try {

              $response = $this->dispatch($request);

          } catch (Exception $e) {

              $response = $this->exceptionResponse($e);
          }

          return $response;
      }




      /**
       * @param Request $request
       * @param Response $response
       * @return void
      */
      public function terminate(Request $request, Response $response)
      {
            // $response->withProtocol($request->getProtocolVersion());
            echo $response->getBody();
      }





      /**
       * @return void
      */
      protected function loadHelpers()
      {
          require_once __DIR__ . '/helpers.php';
      }




      /**
       * @param Request $request
       * @return Response
       * @throws NotFoundException
      */
      protected function dispatch(Request $request): Response
      {
          if(! $route = $this->router->match($request->getMethod(), $request->getRequestUri())) {
               throw new NotFoundException();
          }

          if ($route->callable()) {
               return $this->processResponse(call_user_func_array($route->getAction(), [$request]));
          }

          list($controller, $action) = $route->getAction();

          return $this->processResponse(call_user_func_array([new $controller($this->app), $action], [$request]));
      }




      /**
       * @param $response
       * @return Response
      */
      protected function processResponse($response): Response
      {
           if ($response instanceof $response) {
                return $response;
           } elseif (is_array($response)) {
               return new JsonResponse($response);
           }
           return new Response($response);
      }




      /**
       * @param Exception $exception
       * @return Response
      */
      private function exceptionResponse(Exception $exception)
      {
          $code = $exception->getCode();
          $title = ($code === 404 ? "Страница не найдена" : "Ошибка сервера");
          $this->app['view']->layout("layouts/default");
          return new Response($this->app['view']->render("errors/{$code}", compact('title')));
      }
}