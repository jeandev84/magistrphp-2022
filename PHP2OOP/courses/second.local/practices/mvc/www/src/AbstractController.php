<?php
namespace Specialist;

use Specialist\Http\Response\Response;


abstract class AbstractController
{


     /**
      * @var App
     */
     protected $app;




     /**
      * @param App $app
     */
     public function __construct(App $app)
     {
         $this->app = $app;
     }




     /**
      * @param string $template
      * @param array $variables
      * @return Response
     */
     public function render(string $template, array $variables = []): Response
     {
          return new Response($this->app['view']->render($template, $variables));
     }
}