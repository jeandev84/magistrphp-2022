<?php
namespace Specialist\Templating;

use Specialist\Templating\Exception\ViewException;

class View
{

      /**
       * @var string
      */
      protected $root;


      /**
       * @var string
      */
      protected $layout;



     /**
      * @param string $root
     */
     public function __construct(string $root)
     {
         $this->root = rtrim($root, '\\/');
     }




     /**
      * @param string $layout
      * @return void
     */
     public function layout(string $layout)
     {
         $this->layout = $layout;
     }


    /**
     * @param string $template
     * @param array $params
     * @return string
     * @throws ViewException
     */
     public function render(string $template, array $params = []): string
     {
         extract($params, EXTR_SKIP);

         ob_start();
         require_once $this->loadTemplate($template);
         $content = ob_get_clean();

         if (! $this->layout) {
              return $content;
         }

         require_once $this->loadTemplate($this->layout);

         return ob_get_clean();
     }




     /**
      * @param string $filename
      * @return string
      * @throws ViewException
     */
     public function loadTemplate(string $filename): string
     {
         $filename = sprintf('%s%s%s.php', $this->root, DIRECTORY_SEPARATOR, $filename);;

         if (! file_exists($filename)) {
              throw new ViewException("File : $filename does not exist.");
         }

         return $filename;
     }
}