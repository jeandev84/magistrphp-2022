<?php
namespace App\Controller;

use Specialist\Controller;


class CatalogController extends Controller
{

    public function index()
    {
        return $this->render('catalog/index', [
            'title' => 'Каталог'
        ]);
    }
}