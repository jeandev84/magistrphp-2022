<?php

// Использование явного класса
class Logger
{
    public function log($msg)
    {
        echo $msg;
    }
}

class Debug
{

    protected $logger;


    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }


    /**
     * @return Logger
    */
    public function getLogger(): Logger
    {
        return $this->logger;
    }
}


$debug = new Debug();
$debug->setLogger(new Logger());


// Использование анонимного класса
// Аннонимный класс - используется анонимный класс для однакратного использования класса
$debug->setLogger(new class {
    public function log($msg) {
        echo $msg;
    }
});