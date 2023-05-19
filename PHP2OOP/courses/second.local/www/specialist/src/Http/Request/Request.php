<?php
namespace Specialist\Http\Request;

use Specialist\Http\Bag\CookieBag;
use Specialist\Http\Bag\FileBag;
use Specialist\Http\Bag\ParameterBag;
use Specialist\Http\Bag\ServerBag;
use Specialist\Http\Session\Session;

class Request
{

    public ParameterBag $queries;
    public ParameterBag $attributes;
    public ParameterBag $request;
    public ParameterBag $files;
    public CookieBag $cookies;
    public ServerBag $server;
    public Session $sessions;
    protected string $version = 'HTTP/1.0';
    protected string $content;


    /**
     * @param array $queries
     * @param array $attributes
     * @param array $request
     * @param array $files
     * @param array $cookies
     * @param array $server
     * @param string|null $content
    */
    public function __construct(
        array $queries = [],
        array $attributes = [],
        array $request = [],
        array $files = [],
        array $cookies = [],
        array $server = [],
        string $content = null
    )
    {
        $this->queries    = new ParameterBag($queries);
        $this->attributes = new ParameterBag($attributes);
        $this->request    = new ParameterBag($request);
        $this->files      = new FileBag($files);
        $this->cookies    = new CookieBag($cookies);
        $this->sessions   = new Session();
        $this->server     = new ServerBag($server);
        $this->content    = $content;
    }




    /**
     * @return static
    */
    public static function createFromGlobals(): static
    {
         return new static($_GET, [], $_POST, $_FILES, $_COOKIE, $_SERVER, 'php://input');
    }





    /**
     * @return string|null
    */
    public function getMethod(): ?string
    {
        return $this->server->get('REQUEST_METHOD');
    }



    /**
     * @return string|null
    */
    public function getRedirectURL(): ?string
    {
       return $this->server->get('REDIRECT_URL');
    }





    /**
     * @return string
    */
    public function getRequestUri(): string
    {
        return $this->server->get('REQUEST_URI');
    }



    /**
     * @return string
   */
    public function getProtocolVersion(): string
    {
        return $this->version;
    }




    /**
     * @param string $method
     * @return bool
    */
    public function isMethod(string $method): bool
    {
         return $this->getMethod() === strtoupper($method);
    }
}