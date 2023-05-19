<?php

class View
{
  private $model;
  private $controller;
  public function __construct(Controller $controller, Model $model){
    $this->controller = $controller;
    $this->model = $model;
  }
  public function render(){
    return  
      '<a href="mvc.php?action=index">Index</a> ' .
      '<a href="mvc.php?action=about">About</a> ' .
    $this->model->content;
  }
}