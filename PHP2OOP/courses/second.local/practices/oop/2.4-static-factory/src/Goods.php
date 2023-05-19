<?php
declare(strict_types=1);

// Товар
abstract class Goods
{

     const GOODS_HTML  = 'HTML';
     const GOODS_JSON  = 'JSON';
     const GOODS_CSV   = 'CSV';
     const GOODS_ARRAY = 'ARRAY';


     protected string $title;
     protected float $price;




     /**
      * Конструктор товара
      *
      * @param string $title
      * @param float $price
     */
     public function __construct(string $title, float $price)
     {
         $this->title = $title;
         $this->price = $price;
     }



     /**
      * @param string $format
      * @return mixed
     */
     abstract public function get(string $format = Goods::GOODS_HTML);
}