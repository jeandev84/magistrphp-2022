<?php
namespace Specialist\HTML\Form;

class Form
{

      /**
       * @var array
      */
      protected $data = [];




      /**
       * @param array $data
      */
      public function __construct(array $data)
      {
          $this->data = $data;
      }




      /**
       * @param string $method
       * @param string $action
       * @return $this
      */
      public function start(string $method, string $action): static {}





      public function end() {}


      public function __toString(): string
      {
          return '';
      }
}