<?php
namespace Form;

class Name
{
     public function __construct(protected string $name)
     {
     }

     /**
      * @return string
     */
     public function getName(): string
     {
        return $this->name;
     }
}