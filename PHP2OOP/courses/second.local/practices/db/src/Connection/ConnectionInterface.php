<?php

interface ConnectionInterface
{
    public function connect(array $config);
    public function connected(): bool;
    public function disconnect();
    public function statement(string $sql);
    public function beginTransaction();
    public function commit();
    public function rollback();
}