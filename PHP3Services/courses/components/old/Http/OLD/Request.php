<?php

use src\Http\Body;

class Request
{

      protected $method = 'GET';

      public function __construct(
          protected array $queries = [],
          protected array $request = [],
          protected array $attributes = [],
          protected ?string $content = null
      )
      {

      }


    /**
     * @return array
     */
    public function getQueries(): array
    {
        return $this->queries;
    }


    /**
     * @return array
     */
    public function getRequest(): array
    {
        return $this->request;
    }


    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }


    /**
     * @return string|null
     * @throws Exception
    */
    public function getContent(): ?string
    {
        if (! $this->content) {
            return file_get_contents('php://input');
        }

        $params = [
            'method' => 'POST',
            'content' => http_build_query($_POST)
        ];

        $context = stream_context_create($params);

        if(! $fp = @fopen($this->content, 'rb', false, $context)) {
             throw new Exception("Problem with $this->content, $php_errormsg");
        }

        return @stream_get_contents($fp);
    }



    /**
     * @return Body
     * @throws Exception
    */
    public function getBody()
    {
         return new Body($this->getContent());
    }
}
