<?php

namespace components\Http;

class Request
{

    protected $method = 'GET';

    public function __construct(
        protected array   $queries = [],
        protected array   $request = [],
        protected array   $attributes = [],
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


    /**
     * @param $method
     * @param string $url
     * @param array $attributes
     * @param array $headers
     * @return string
     * @throws Exception
     */
    public static function create($method, string $url, array $attributes = [], array $headers = [])
    {
        $params = [
            'http' => [
                'method' => $method,
                'content' => http_build_query($attributes),
                'header' => join(', ', $headers)
            ]
        ];

        $context = stream_context_create($params);

        if (!$fp = @fopen($url, 'rb', false, $context)) {
            throw new Exception("Problem with $url, $php_errormsg");
        }

        if (!$content = @stream_get_contents($fp)) {
            return "";
        }

        return $content;
    }


    /**
     * @param string $method
     * @param string $url
     * @param array $attributes
     * @return string
     */
    public static function createFromStream(string $method, string $url, array $attributes = []): string
    {
        $params = [
            'http' => [
                'method' => $method,
                'header' => join(', ', $attributes['header']),
                'content' => $attributes['content']
            ]
        ];

        $context = stream_context_create($params);

        return file_get_contents($url, false, $context);
    }
}
