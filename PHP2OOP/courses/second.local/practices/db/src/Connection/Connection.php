<?php

abstract class Connection
{
    abstract public function make(array $config);
}