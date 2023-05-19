<?php

class Book extends Goods implements IGoods {
  use Checkout;

  public $author;
  public $description;
  public static $counter = 0;

  public function __construct($title, $author, $description = '', $price = 0  ){
    parent::__construct($title, $price);
    self::$counter++;
    $this->author = $author;
    $this->description = $description;   
    /*
    echo __FUNCTION__;
    echo __CLASS__;
    */
    // echo 'Создан экземпляр класса ' . __CLASS__ . '<hr />';
  }
  public function __destruct( ){
    // echo 'Удалён экземпляр класса ' . __CLASS__ . '<hr />';
  } 

  public function get($format = Goods::GOODS_HTML){
    $method = 'get' . $format;
    return $this->$method();
  }   


  public function __clone(){
    self::$counter++;
    echo 'Клонирован экземпляр класса ' . __CLASS__ . '<hr />';
  }

  public function __call($methodName, $arguments){
    // echo $methodName . '<hr />';
    // echo "<pre>";
    // print_r($arguments);
    // echo "</pre>";

    if( method_exists($this, 'get'.$methodName) ){
      $method =  'get'.$methodName;
      return $this->$method();
    }
  }
  
  public function __toString(){
    return $this->title;
  }
  
  public function __invoke(){
    return 'Вызвали как метод';
  }  

  final public function getHTML(){    
    return "<h3>{$this->title}</h3>
    <div>Автор: {$this->author}</div>
    <div>Описание: {$this->description}</div>
    <div>Цена: {$this->price}</div>
    ";
  }

  public function getCSV(){    
    return "CSV";
  }
  public function getJSON(){    
    return "JSON";
  }
  public function getArray(){    
    return "Array";
  }
}