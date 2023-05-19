<?php
namespace Psr\Http;

use Psr\Http\Message\StreamInterface;

// https://stackoverflow.com/questions/49574811/create-a-stream-from-a-resource
class StreamServiceTwo implements StreamInterface
{
    // ...

    public function __construct($url, $opt = null) {

        // ...

        if( is_resource( $url ) ) {

            /*
             * Check that the $resource is a valid resource
             * (e.g. an http request from an fopen call vs a mysql resource.)
             * or possibly a stream context that still needs to create a
             * request...
             */

            if( !$isValid ) {
                return false;
            }

            $this->resource = $resource;

        } else {

            // ...

            $this->resource = fopen($url, $modifiedOpt);

            // ...

        }

    }

    // ...

    /* createStreamFromResource would call Stream::fromResource($r)
     * or possibly Stream($resource) directly, your call.
     */
    static function fromResource($resource) {
        return new static($resource);
    }


    public function createStreamFromResource($resource) {
        return Stream::fromResource($resource);
    }
}