<?php
namespace Specialist\Routing\Exception;

class NotFoundException extends \Exception
{

     public function __construct()
     {
         parent::__construct("Route not found.", 404);
     }
}