<?php

namespace stream;

use Psr\Http\Message\StreamInterface;

// https://www.php.net/manual/en/function.stream-context-create.php
// https://stackoverflow.com/questions/49574811/create-a-stream-from-a-resource
class Stream implements StreamInterface {

    /**
     * Stream (resource).
     *
     * @var resource
     */
    private $stream;

    /**
     *
     * @param string|resource $stream Stream name, or resource.
     * @param string $accessMode (optional) Access mode.
     * @throws \InvalidArgumentException
     */
    public function __construct($stream, string $accessMode = 'r') {
        if (
            !isset($stream) ||
            (!is_string($stream) && !is_resource($stream))
        ) {
            throw new \InvalidArgumentException(
                'The provided stream must be a filename, or an opened resource of type "stream"!'
            );
        }

        if (is_string($stream)) {
            $this->stream = fopen($stream, $accessMode);
        } elseif (is_resource($stream)) {
            if ('stream' !== get_resource_type($stream)) {
                throw new \InvalidArgumentException('The provided resource must be of type "stream"!');
            }

            $this->stream = $stream;
        }
    }

    /**
     * Write data to the stream.
     *
     * @param string $string The string that is to be written.
     * @return int Returns the number of bytes written to the stream.
     * @throws \RuntimeException on failure.
     */
    public function write($string) {
        return fwrite($this->stream, $string);
    }

    /**
     * Reads all data from the stream into a string, from the beginning to end.
     *
     * @return string
     */
    public function __toString() {
        try {
            // Rewind the stream.
            fseek($this->stream, 0);

            // Get the stream contents as string.
            $contents = stream_get_contents($this->stream);

            return $contents;
        } catch (\RuntimeException $exc) {
            return '';
        }
    }

    public function close() {}
    public function detach() {}
    public function eof() {}
    public function getContents() {}
    public function getMetadata($key = null) {}
    public function getSize() {}
    public function isReadable() {}
    public function isSeekable() {}
    public function isWritable() {}
    public function read($length) {}
    public function rewind() {}
    public function seek($offset, $whence = SEEK_SET) {}
    public function tell() {}

}