<?php
namespace App\Controllers;

use Specialist\Controller;
use Specialist\Http\Request\Request;
use Specialist\Http\Response\Response;

class OrderController extends Controller
{
      /**
       * @param Request $request
       * @return Response
      */
      public function index(Request $request): Response
      {
          $name = '';
          $address = '';
          $email = '';
          $phone = '';


          $cardName = '';
          $cardNumber = '';
          $cardExpiration = '';
          $cardCVV = '';


          return $this->render('order/index', [
              'page' => 'Заказ',
              'name'  => $name,
              'address' => $address,
              'email' => $email,
              'phone' => $phone,
              'cardName' => $cardName,
              'cardNumber' => $cardNumber,
              'cardExpiration' => $cardExpiration,
              'cardCVV' => $cardCVV
          ]);
      }
}