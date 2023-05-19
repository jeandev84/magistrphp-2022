<?php
namespace App\Controllers;

use App\View\View;
use App\Controllers\BaseController;
use App\Models\Book;

class IndexController extends BaseController
{

  public function index()
  {   
    $titlePage = 'Главная';

    return $this->render('index', [
      'titlePage' => $titlePage,
    ]);
  }

  public function about()
  {   
    $titlePage = 'О нас';

    return $this->render('about', [
      'titlePage' => $titlePage,
    ]);
  }

}