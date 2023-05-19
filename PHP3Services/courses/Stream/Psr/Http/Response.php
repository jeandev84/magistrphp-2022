<?php

namespace Psr\Http;

use stream\Psr\message\http\ResponseInterface;
use stream\Psr\message\http\StreamInterface;

class Response implements ResponseInterface {

    /**
     *
     * @param StreamInterface $body Message body.
     */
    public function __construct(StreamInterface $body) {
        $this->body = $body;
    }

    /**
     * Gets the body of the message.
     *
     * @return StreamInterface Returns the body as a stream.
     */
    public function getBody() {
        return $this->body;
    }

    public function getHeader($name) {}
    public function getHeaderLine($name) {}
    public function getHeaders() {}
    public function getProtocolVersion() {}
    public function hasHeader($name) {}
    public function withAddedHeader($name, $value) {}
    public function withBody(StreamInterface $body) {}
    public function withHeader($name, $value) {}
    public function withProtocolVersion($version) {}
    public function withoutHeader($name) {}
    public function getReasonPhrase() {}
    public function getStatusCode() {}
    public function withStatus($code, $reasonPhrase = '') {}

}