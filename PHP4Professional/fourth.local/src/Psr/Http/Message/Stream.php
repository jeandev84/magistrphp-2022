<?php
namespace App\Modules\Psr\Http\Message;

use App\Modules\Psr\Http\StreamInterface;

class Stream implements StreamInterface
{


    /**
     * @var false|resource
    */
    protected $resource;



    /**
     * @var string
    */
    protected $path;



    /**
     * @param string $path
     * @param string $mode
    */
    public function __construct(string $path, string $mode = 'r')
    {
        $this->resource = fopen($path, $mode, '');
        $this->path     = $path;
    }



    /**
     * @inheritDoc
    */
    public function __toString()
    {
         // TODO remove and use fgets()
         return file_get_contents($this->path);
    }



    /**
     * @inheritDoc
    */
    public function close()
    {
        // TODO: Implement close() method.
    }



    /**
     * @inheritDoc
    */
    public function detach()
    {
        // TODO: Implement detach() method.
    }




    /**
     * @inheritDoc
    */
    public function getSize()
    {
        // TODO: Implement getSize() method.
    }




    /**
     * @inheritDoc
    */
    public function tell()
    {
        // TODO: Implement tell() method.
    }



    /**
     * @inheritDoc
    */
    public function eof()
    {
        // TODO: Implement eof() method.
    }



    /**
     * @inheritDoc
    */
    public function isSeekable()
    {
        // TODO: Implement isSeekable() method.
    }



    /**
     * @inheritDoc
    */
    public function seek($offset, $whence = SEEK_SET)
    {
        // TODO: Implement seek() method.
    }



    /**
     * @inheritDoc
    */
    public function rewind()
    {
        // TODO: Implement rewind() method.
    }




    /**
     * @inheritDoc
    */
    public function isWritable()
    {
        // TODO: Implement isWritable() method.
    }



    /**
     * @inheritDoc
    */
    public function write($string)
    {
        // TODO: Implement write() method.
    }




    /**
     * @inheritDoc
     */
    public function isReadable()
    {
        // TODO: Implement isReadable() method.
    }

    /**
     * @inheritDoc
     */
    public function read($length)
    {
        // TODO: Implement read() method.
    }

    /**
     * @inheritDoc
     */
    public function getContents()
    {
        // TODO: Implement getContents() method.
    }

    /**
     * @inheritDoc
     */
    public function getMetadata($key = null)
    {
        // TODO: Implement getMetadata() method.
    }
}