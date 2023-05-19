<?php
namespace Specialist\Http\Response;

class RedirectResponse extends Response
{


       /**
        * @var string
       */
       protected $path;




       /**
       * @param string $path
       * @param int $status
      */
      public function __construct(string $path, int $status = 301)
      {
          parent::__construct(null, $status);
          $this->path = $path;
      }




      /**
       * @return void
      */
      public function send(): void
      {
           if (headers_sent()) {
              return;
           }

           http_response_code($this->status);
           header("Location: $this->path");
      }




      /**
       * @return string
      */
      public function __toString(): string
      {
          return "<!DOCTYPE html>
                <html>
                   <head>
                    <title>Redirect $this->status</title>
                   </head>
                   <body>
                       <p>Permanent redirection to : $this->path</p>
                   </body>             
            </html>";
      }
}