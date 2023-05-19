<?php
namespace App\View;

class View
{
  public function render($template, $params){
    foreach($params as $key => $value)
    {
      $$key = $value;
    }
    ob_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/views/'.$template.'.php';
    ob_end_flush();
  }
}