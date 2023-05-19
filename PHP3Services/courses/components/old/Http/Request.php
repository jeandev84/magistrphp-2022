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
        if ($this->content) {
            return $this->content;
        }

        return $this->getBody();
    }



    /**
     * @return Body
     * @throws Exception
    */
    public function getBody(): Body
    {
         return new Body($this->getContent());
    }
}
