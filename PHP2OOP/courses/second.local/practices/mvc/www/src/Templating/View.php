<?php
namespace Specialist\Templating;

class View
{

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
      * @param array $params
      * @return string
     */
     public function render(string $template, array $params = []): string
     {
         foreach ($params as $key => $value) {
             $$key = $value;
         }

         ob_start();
         require_once sprintf('%s%s%s.php', $this->root, DIRECTORY_SEPARATOR, $template);
         // $content = ob_get_contents(); // заввращает контент
         // ob_end_clean(); // Заверщает
         return ob_get_clean(); // возвращает контент и завещает (ob_get_contents() + ob_end_clean())
     }
}