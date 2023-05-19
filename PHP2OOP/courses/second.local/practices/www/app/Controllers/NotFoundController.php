<?php
namespace App\Controllers;

use Specialist\Controller;


class NotFoundController extends Controller
{

     public function index(): \Specialist\Http\Response\Response
     {
          return $this->render('errors/404', [
              'page' => 'Страница не найдена'
          ]);
     }
}