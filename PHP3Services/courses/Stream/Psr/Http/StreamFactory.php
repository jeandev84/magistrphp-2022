<?php

namespace stream;

use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

class StreamFactory implements StreamFactoryInterface {

    /**
     * Create a new stream from an existing resource.
     *
     * The stream MUST be readable and may be writable.
     *
     * @param resource $resource
     *
     * @return \stream\Psr\message\http\StreamInterface
     * @throws \InvalidArgumentException
     */
    public function createStreamFromResource($resource) {
        /*
         * @asking What if $resource is not already a resource of type *"stream"*?
         * How can I transform it into a stream, e.g. into a resource of type *"stream"*,
         * so that I can pass it further, to the call for creating a new `Stream` object
         * with it? Is there a way (a PHP method, a function, or maybe a casting function)
         * of achieving this task?
         */
        //...

        return new Stream($resource, 'w+b');
    }

    /**
     * Create a new stream from a string.
     *
     * The stream SHOULD be created with a temporary resource.
     *
     * @param string $content
     *
     * @return \stream\Psr\message\http\StreamInterface
     * @throws \InvalidArgumentException
     */
    public function createStream($content = '') {
        if (!isset($content) || !is_string($content)) {
            throw new \InvalidArgumentException('For creating a stream, a content string must be provided!');
        }

        $stream = $this->createStreamFromFile('php://temp', 'w+b');

        $stream->write($content);

        return $stream;
    }

    /**
     * Create a stream from an existing file.
     *
     * The file MUST be opened using the given mode, which may be any mode
     * supported by the `fopen` function.
     *
     * The `$filename` MAY be any string supported by `fopen()`.
     *
     * @param string $filename
     * @param string $mode
     *
     * @return \stream\Psr\message\http\StreamInterface
     */
    public function createStreamFromFile($filename, $mode = 'r') {
        return new Stream($filename, $mode);
    }

}