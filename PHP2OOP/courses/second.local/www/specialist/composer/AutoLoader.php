<?php


class AutoLoader
{


    /**
     * @var string[]
    */
    protected $namespaces = [];



    /**
     * @var string[]
    */
    protected $files = [];



    /**
     * @var string
    */
    protected $root;



    /**
     * @param string $root
    */
    public function __construct(string $root)
    {
         $this->root = realpath($root);
    }


    /**
     * @param string $namespace
     * @param string $location
     * @return $this
    */
    public function namespace(string $namespace, string $location): static
    {
         $namespace = trim($namespace, '\\/');
         $location  = trim($location, '\\/');
         $this->namespaces[$namespace] = $location;

         return $this;
    }




    /**
     * @param array $config
     * @return $this
    */
    public function namespaces(array $config): static {
        foreach ($config as $namespace => $location) {
           $this->namespace($namespace, $location);
        }

        return $this;
    }




    /**
     * @param array $classes
     * @return void
    */
    public function classmap(array $classes)
    {

    }




    /**
     * @param array $files
     * @return $this
    */
    public function files(array $files): static
    {
          $this->files = $files;

          return $this;
    }




    /**
     * @return void
    */
    public function register(): void
    {
        // Load files
        foreach ($this->files as $filename) {
            $this->loadFile($filename);
        }

        // Load namespace
        spl_autoload_register([$this, 'autoloadPsr4']);
    }


    /**
     * @param string $classname
     * @return bool
    */
    protected function autoloadPsr4(string $classname): bool
    {
        $fragments = explode('\\', $classname);

        if (empty($fragments)) {
            return false;
        }

        $namespace = array_shift($fragments);

        if (! empty($this->namespaces[$namespace])) {

            $path     = join(DIRECTORY_SEPARATOR, $fragments);
            $path     = $this->namespaces[$namespace] . DIRECTORY_SEPARATOR . $path;

            return $this->loadFile($path);
        }

        return false;
    }



    /**
     * @param string $filename
     * @return false
    */
    private function loadFile(string $filename): bool
    {
        $filename = sprintf('%s%s%s.php', $this->root, DIRECTORY_SEPARATOR, $filename);

        if (! file_exists($filename)) {
            return false;
        }

        require_once $filename;
        return true;
    }
}


/*
require_once __DIR__.'/composer/AutoLoader.php';

$autoloader = new AutoLoader(realpath(__DIR__.'/../'));
$autoloader->namespaces([
    'Specialist\\' => 'src/',
    'App\\' => 'app/'
]);

$autoloader->register();
*/