<?php


class GoodsCollection
{

     /**
      * @var Goods[]
     */
     private $items = [];



     /**
      * @param Goods[] $items
     */
     public function __construct(array $items)
     {
         $this->items = $items;
     }




     /**
      * @return void
     */
     public function show() {

          foreach ($this->items as $item) {
               echo $item->get(), "<hr>";
          }
     }
}