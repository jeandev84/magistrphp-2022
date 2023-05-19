<?php
namespace Specialist\Container;

interface ContainerInterface
{
       /**
        * @param string $id
        * @return mixed
       */
       public function get(string $id);




       /**
        * @param string $id
        * @return mixed
       */
       public function has(string $id): mixed;
}