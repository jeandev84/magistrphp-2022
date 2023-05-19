<?php
namespace Specialist;

use App\Http\Controller\CatalogController;
use Specialist\Http\Request\Request;
use Specialist\Http\Response\Response;
use Specialist\Routing\Router;



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

              $response = $this->dispatchRoute($request);

          } catch (\Exception $exception) {
              $response = new Response($exception->getMessage());
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


      protected function dispatchRoute(Request $request)
      {
          /*
           $response = $this->router->dispatch($request->getMethod(), $request->getRequestUri());
           $response = new Response('Hello world');
           */

          $controller = new CatalogController($this->app);

          if ($request->queries->has('action')) {
              $action = $request->queries->get('action');
              $response = $controller->{$action}();
          }

          return new Response($response);
      }





      /**
       * @return void
      */
      protected function loadHelpers()
      {
          require_once __DIR__ . '/helpers.php';
      }

}