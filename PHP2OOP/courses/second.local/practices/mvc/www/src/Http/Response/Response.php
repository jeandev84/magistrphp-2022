<?php
namespace Specialist\Http\Response;

class Response
{


      /**
       * @var string
      */
      protected $version;




      /**
       * @var string
      */
      protected string $content;


      /**
       * @var int
      */
      protected int $status;




      /**
       * @var array
      */
      protected array $headers = [];




      /**
       * @param string $content
       * @param int $status
       * @param array $headers
      */
      public function __construct(string $content, int $status = 200, array $headers = [])
      {
           $this->content = $content;
           $this->status  = $status;
           $this->headers = $headers;
      }



      public function send(): void
      {
           http_response_code($this->status);

           foreach ($this->headers as $key => $value) {
               header(sprintf('%s: %s', $key, $value));
           }
      }


      /**
       * @param string $version
       * @return $this
      */
      public function withProtocol(string $version)
      {
           $this->version = $version;

           return $this;
      }




     /**
      * @return string
     */
     public function getProtocol(): string
     {
         return $this->version;
     }


      /**
       * @return string
      */
      public function getBody(): string
      {
           return $this->content;
      }




     /**
       * @return int
     */
     public function getStatusCode(): int
     {
         return $this->status;
     }




     /**
      * @return array
     */
     public function getHeaders(): array
     {
         return $this->headers;
     }



      /**
       * @return string
      */
      public function __toString(): string
      {
          return $this->getBody();
      }
}