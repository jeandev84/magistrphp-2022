<?php
namespace Specialist;

use App\Entity\Book\Book;
use Specialist\Http\Response\RedirectResponse;
use Specialist\Http\Response\Response;
use Specialist\Templating\Exception\ViewException;
use Specialist\Templating\View;


abstract class Controller
{



     /**
      * @var App
     */
     protected $app;



     /**
      * @var string
     */
     protected $layout = 'layouts/default';




     /**
      * @param App $app
     */
     public function __construct(App $app)
     {
          $this->app  = $app;
     }




    /**
     * @param string $template
     * @param array $params
     * @return Response
    */
    protected function render(string $template, array $params = []): Response
    {
        $view = $this->app['view'];
        $view->layout($this->layout);
        return new Response($this->app['view']->render($template, $params));
    }




    /**
     * @param string $path
     * @return RedirectResponse
    */
    protected function redirectTo(string $path): RedirectResponse
    {
         return new RedirectResponse($path);
    }
}