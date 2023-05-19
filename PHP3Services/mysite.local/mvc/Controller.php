<?php

class Controller
{

  protected $mysqli;

  public function __construct($mysqli){
    $this->mysqli = $mysqli;
  }
  public function index(){
    $content = "<h1>Главная</h1>";

    return new View(['content' => $content]);
  }
  public function sqlite(){
    $content = "<h1>SQLite</h1>";

    return new View(['content' => $content]);
  }
  public function xml(){
    $content = "<h1>XML</h1>";

    return new View(['content' => $content]);
  }
  public function rest(){
    $content = "<h1>REST</h1>";

    return new View(['content' => $content]);
  }
  public function soap(){
    $content = "<h1>SOAP</h1>";

    return new View(['content' => $content]);
  }
  public function graphql(){
    $content = "<h1>GraphQL</h1>";

    return new View(['content' => $content]);
  }
  public function jwt(){
    $content = "<h1>jwt</h1>";

    return new View(['content' => $content]);
  }

  public function streams(){
    $content = "<h1>потоки</h1>";

    return new View(['content' => $content]);
  }
}