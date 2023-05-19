<?php

interface MysqliConnectionInterface
{
    public function getMysqli(): mysqli;
}