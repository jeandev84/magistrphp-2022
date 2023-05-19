<?php

namespace components\Http;

use Exception;

class Body
{


    /**
     * @param string $url
     * @param array $params
     */
    public function __construct(protected string $url = 'php://input', protected array $params = [])
    {
    }


    /**
     * @return array
    */
    public function toArray(): array
    {
        parse_str(file_get_contents($this->url), $data);

        return (array)$data;
    }


    /**
     * @return false|string
     */
    public function toJson(): bool|string
    {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT);
    }


    /**
     * @return string
     * @throws Exception
     */
    public function create(): string
    {
        $params = [
            'method' => $this->params['method'],
            'content' => http_build_query($this->params['content'])
        ];

        $context = stream_context_create($params);

        if (!$fp = @fopen($this->url, 'rb', false, $context)) {
            throw new Exception("Problem with $this->url, $php_errormsg");
        }

        if (!$content = @stream_get_contents($fp)) {
            return "";
        }

        return $content;
    }


    /**
     * @return string
     * @throws Exception
     */
    public function __toString(): string
    {
        return $this->create();
    }
}