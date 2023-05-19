<?php
namespace Specialist\Templating\Loader;

use Specialist\Templating\Exception\ViewException;

class TemplateLoader
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
         $this->root =  rtrim($root, '\\/');
     }




     /**
      * @param string $filename
      * @return string
      * @throws ViewException
     */
     public function loadTemplate(string $filename): string
     {
         $filename = sprintf('%s%s%s', $this->root, DIRECTORY_SEPARATOR, $filename);;

         if (! file_exists($filename)) {
             throw new ViewException("File : $filename does not exist.");
         }

         return $filename;
     }
}