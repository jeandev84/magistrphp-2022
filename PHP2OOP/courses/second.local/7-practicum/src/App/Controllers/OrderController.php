<?php
namespace App\Controllers;

use App\View\View;
use App\Controllers\BaseController;

class OrderController extends BaseController
{

  public function index()
  {
    $titlePage = 'Заказ';

    $name = '';
    $address = '';
    $email = '';
    $phone = '';

    $cardName = '';
    $cardNumber = '';
    $cardExpiration = '';
    $cardCVV = '';

    return $this->render('order', [
      'titlePage' => $titlePage,

      'name' => $name,
      'address' => $address,
      'email' => $email,
      'phone' => $phone,

      'cardName' => $cardName,
      'cardNumber' => $cardNumber,
      'cardExpiration' => $cardExpiration,
      'cardCVV' => $cardCVV,

    ]);
  }

}