<?php

//исходный массив
$menu = [
  '/' => 'главная', 
  '/catalog' => 'каталог', 
  '/delivery' => 'доставка',   
  '/about' => 'о нас', 
];

?>


<nav>
  <ul>
    <li><a href="/"><?= $menu['/'] ?></a>
    <li><a href="/catalog"><?= $menu['/catalog'] ?></a>
    <li><a href="/delivery"><?= $menu['/delivery'] ?></a>
    <li><a href="/about"><?= $menu['/about'] ?></a>
  </ul>
</nav>