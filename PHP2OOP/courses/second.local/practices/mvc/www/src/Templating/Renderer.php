<?php
namespace Specialist\Templating;

class Renderer
{


     /**
      * @var string
     */
     protected $root;



     /**
      * @param string $root
     */
     public function __construct(string $root)
     {
         $this->root = rtrim($root, '\\/');
     }




     /**
      * @param string $template
      * @param array $variables
      * @return string
     */
     public function render(string $template, array $variables = []): string
     {
           $template = $this->root . DIRECTORY_SEPARATOR. trim($template, '\\/');;

           extract($variables);

           ob_start();
           @require_once $template;
           return ob_get_clean();
     }
}