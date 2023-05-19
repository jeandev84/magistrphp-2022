<?php
namespace components\Http;

class Response
{

    public function __construct(protected string $body = '', protected int $status = 200, protected array $headers = [])
    {
    }


    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }


    /**
     * @return int
     */
    public function getStatus(): int
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


    public function send()
    {

    }
}