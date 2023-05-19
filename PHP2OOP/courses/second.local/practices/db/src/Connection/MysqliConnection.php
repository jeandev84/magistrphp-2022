<?php

// https://www.php.net/manual/fr/class.mysqli.php
class MysqliConnection extends Connection implements MysqliConnectionInterface, ConnectionInterface
{

    /**
     * @var mysqli
    */
    protected $connection;


    /**
     * @param array $config
     * @return mysqli
    */
    public function make(array $config)
    {
        return new mysqli(
            $config['host'], $config['username'], $config['password'], $config['database']
        );
    }




    /**
     * @param array $config
     * @return void
    */
    public function connect(array $config)
    {
         mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

         $this->connection = $this->make($config);
    }




    /**
     * @return bool
    */
    public function connected(): bool
    {
        return $this->connection instanceof mysqli;
    }


    /**
     * @return void
    */
    public function disconnect()
    {
        $this->connection->close();
    }




    /**
     * @param string $sql
     * @return bool|mysqli_result
    */
    public function statement(string $sql)
    {
        return $this->connection->query($sql);
    }





    /**
     * @return mysqli
    */
    public function getMysqli(): mysqli
    {
         return $this->connection;
    }

    public function beginTransaction()
    {
        $this->connection->begin_transaction();
    }


    public function commit()
    {
        $this->connection->commit();
    }

    public function rollback()
    {
        $this->connection->rollback();
    }
}