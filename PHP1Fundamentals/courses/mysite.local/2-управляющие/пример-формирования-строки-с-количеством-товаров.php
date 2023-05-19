<?php

$goods = 23; 
// $goods = rand(0, 125); 
$word = "товаров";
if( $goods % 100 < 5 or $goods % 100 > 20 ){
    if( $goods % 10 == 1 ) $word = "товар";
    if( $goods % 10 > 1 and $goods % 10 < 5 )
      $word = "товара";
}
echo "В корзине <b>$goods</b> $word";