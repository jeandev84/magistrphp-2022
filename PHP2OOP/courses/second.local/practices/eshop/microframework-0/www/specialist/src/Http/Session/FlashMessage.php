<?php
namespace Specialist\Http\Session;

class FlashMessage
{


      /**
        * @var Session
       */
       protected $session;


       /**
        * @param Session $session
       */
       public function __construct(Session $session)
       {
            $this->session = $session;
       }




       /**
        * @param string $value
        * @return void
       */
       public function success(string $value)
       {
           $this->session->addFlash('success', $value);
       }



       /**
         * @param string $value
         * @return void
       */
       public function danger(string $value)
       {
           $this->session->addFlash('danger', $value);
       }




       /**
        * @param string $value
        * @return void
       */
       public function notice(string $value)
       {
           $this->session->addFlash('notice', $value);
       }

}