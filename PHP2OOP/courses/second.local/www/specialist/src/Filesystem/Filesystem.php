<?php
namespace Specialist\Filesystem;

class Filesystem
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
          $this->root = $this->resolveBasePath($root);
     }




     /**
      * @param string $path
      * @return string
     */
     public function locate(string $path): string
     {
          return $this->root . DIRECTORY_SEPARATOR . $this->resolveFilename($path);
     }



     /**
      * @param string $dirname
      * @return bool
     */
     public function mkdir(string $dirname): bool
     {
          if (! is_dir($dirname)) {
               return @mkdir($dirname, 0777, true);
          }

          return true;
     }




     /**
      * @param string $filename
      * @return bool
     */
     public function make(string $filename): bool
     {
         $dirname = $this->locate($filename);

         $this->mkdir($dirname);

         return touch($filename);
     }




     /**
      * @param string $filename
      * @param string $content
      * @return false|int
     */
     public function write(string $filename, string $content): bool|int
     {
          return file_put_contents($this->locate($filename), $content.PHP_EOL, FILE_APPEND | LOCK_EX);
     }





     /**
      * @param string $filename
      * @return bool|string
     */
     public function read(string $filename): bool|string
     {
          return file_get_contents($filename);
     }




     /**
      * @param string $path
      * @return string
     */
     private function resolveBasePath(string $path): string
     {
        return rtrim($path, '\\/');
     }




     /**
      * @param string $path
      * @return string
     */
     private function resolveFilename(string $path): string
     {
          return trim($path, '\\/');
     }

}