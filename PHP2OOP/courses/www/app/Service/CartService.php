<?php
namespace App\Service;

use Specialist\Http\Session\SessionInterface;

class CartService
{

     protected $session;


    /**
     * @param SessionInterface $session
     */
     public function __construct(SessionInterface $session)
     {
         $this->session = $session;
     }



     public function add()
     {

     }


     public function decrease()
     {

     }


     public function get()
     {

     }


     public function increment()
     {

     }
}