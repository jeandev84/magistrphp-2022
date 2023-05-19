<?php

// https://stackoverflow.com/questions/49574811/create-a-stream-from-a-resource
namespace stream;
use InvalidArgumentException;

class StreamServiceOne
{

    protected $stream;


    protected $resource;


    public function __construct($stream, string $accessMode = 'r') {

        if (is_string($stream)) {
            $stream = fopen($stream, $accessMode);
        }

        if (! is_resource($stream) || 'stream' !== get_resource_type($stream)) {
            throw new InvalidArgumentException(
                'Invalid stream provided; must be a string stream identifier or stream resource'
            );
        }

        $this->stream = $stream;
    }


    public function isWritable()
    {
        if (! $this->resource) {
            return false;
        }
        $meta = stream_get_meta_data($this->resource);
        $mode = $meta['mode'];
        return (
            strstr($mode, 'x')
            || strstr($mode, 'w')
            || strstr($mode, 'c')
            || strstr($mode, 'a')
            || strstr($mode, '+')
        );
    }



    public function __toString()
    {
        if (! $this->isReadable()) {
            return '';
        }
        try {
            if ($this->isSeekable()) {
                $this->rewind();
            }
            return $this->getContents();
        } catch (RuntimeException $e) {
            return '';
        }
    }

    public function openTempDir()
    {
        $stream = fopen('php://temp', 'r');
    }


    public function testStreamOne()
    {
        /*
         use Tests\Stream;
         use Tests\Response;
         use Tests\StreamFactory;


         /*
          * ================================================
          * Option 1: Create a stream by a stream name
          * (like "php://temp") with read and write rights.
         * ================================================

        $stream = new Stream('php://temp', 'w+b');

        $response = new Response($stream);
        $response->getBody()->write(
            'Stream 1: Created directly.<br/><br/>'
        );
        echo $response->getBody();

        /*
         * ================================================
         * Option 2: Create a stream by a stream name
         * (like "php://temp"), using a stream factory.
         * ================================================

        $streamFactory = new StreamFactory();
        $stream = $streamFactory->createStreamFromFile('php://temp', 'w+b');

        $response = new Response($stream);
        $response->getBody()->write(
            'Stream 2: Created by a stream name, with a stream factory.<br/><br/>'
        );
        */
    }
}