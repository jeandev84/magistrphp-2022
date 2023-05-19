<?php
namespace App\Controllers;
use App\View\View;

class BaseController
{
  public function __construct()
  {
    $this->view = new View;
  }

  public function render($template, $params)
  {
    return $this->view->render($template, $params);
  }
}