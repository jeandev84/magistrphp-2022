<?php

// https://www.php.net/manual/fr/book.pdo.php
class PdoConnection extends Connection implements PdoConnectionInterface, ConnectionInterface
{


    /**
     * @var PDO
    */
    protected $connection;



    /**
     * @param array $config
     * @return PDO
    */
    public function make(array $config)
    {
         return new PDO($config['dsn'], $config['username'], $config['password'], $config['options']);
    }



    /**
     * @param array $config
     * @return void
    */
    public function connect(array $config)
    {
         $this->connection = $this->make($config);
    }


    /**
     * @return bool
    */
    public function connected(): bool
    {
        return $this->connection instanceof PDO;
    }




    /**
     * @return void
    */
    public function disconnect()
    {
        $this->connection = null;
    }




    /**
     * @param string $sql
     * @return false|PDOStatement
    */
    public function statement(string $sql)
    {
        return $this->connection->prepare($sql);
    }





    /**
     * @return PDO
    */
    public function getPdo(): PDO
    {
       return $this->connection;
    }

    public function beginTransaction()
    {
        $this->connection->beginTransaction();
    }

    public function commit()
    {
        $this->connection->commit();
    }



    public function rollback()
    {
        $this->connection->rollBack();
    }
}