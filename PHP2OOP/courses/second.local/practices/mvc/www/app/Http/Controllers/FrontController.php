<?php
namespace App\Http\Controllers;

use Specialist\Controller;

class FrontController extends Controller
{

     public function index()
     {
         return $this->render('index.php', [
             'title' => 'Главная страница'
         ]);
     }


     public function basket()
     {
         return $this->render('about.php', [
             'title' => 'О нас'
         ]);
     }
}