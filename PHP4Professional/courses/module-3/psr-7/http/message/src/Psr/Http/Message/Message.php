<?php
namespace App\Modules\Psr\Http\Message;

use App\Modules\Psr\Http\MessageInterface;
use App\Modules\Psr\Http\StreamInterface;

class Message implements MessageInterface
{

    protected string $protocolVersion = '1.0';
    protected array $headers = [];
    protected StreamInterface $body;

    public function __construct()
    {
        # substr(HTTP/1.0, 5) = 1.0
        $this->protocolVersion = substr($_SERVER['SERVER_PROTOCOL'], 5);
        foreach (headers_list() as $header) {
            list($key, $value) = explode(":", $header, 2);
            $this->headers[$key] = $value;
        }
        $this->body = new Stream('php://input');
    }



    /**
     * @inheritDoc
    */
    public function getProtocolVersion()
    {
        return $this->protocolVersion;
    }



    /**
     * @inheritDoc
    */
    public function withProtocolVersion($version)
    {
        $message = clone $this;

        $message->protocolVersion = $version;

        return $message;
    }



    /**
     * @inheritDoc
     */
    public function getHeaders()
    {
        return $this->headers;
    }



    /**
     * @inheritDoc
    */
    public function hasHeader($name)
    {
        return isset($this->headers[$name]);
    }




    /**
     * @inheritDoc
     */
    public function getHeader($name)
    {
        return $this->headers[$name];
    }






    /**
     * @inheritDoc
    */
    public function getHeaderLine($name)
    {
        if (! $this->hasHeader($name)) {
             return false;
        }

        return implode(', ', $this->headers[$name]);
    }





    /**
     * @inheritDoc
     */
    public function withHeader($name, $value)
    {
         $message = clone $this;
         $message->headers[$name] = $value;
         return $message;
    }




    /**
     * @inheritDoc
     */
    public function withAddedHeader($name, $value)
    {
        $message = clone $this;
        array_push($message->headers[$name], $value);
        return $message;
    }



    /**
     * @inheritDoc
    */
    public function withoutHeader($name)
    {
        $message = clone $this;
        unset($message->headers[$name]);
        return $message;
    }



    /**
     * @inheritDoc
    */
    public function getBody(): StreamInterface
    {
        return $this->body;
    }



    /**
     * @inheritDoc
    */
    public function withBody(StreamInterface $body)
    {
         $message = clone $this;
         $message->body = $body;
         return $message;
    }
}