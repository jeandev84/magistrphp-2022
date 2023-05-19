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
    <?php foreach($menu as $url => $item){ ?>
    <li><a href="<?= $url ?>"><?= $item ?></a>
    <?php } ?>
  </ul>
</nav>

<?php

//для тех, кому нужен второй способ
//  foreach($menu as $url => $item){ 
//   echo "<li><a href=\" $url \">$item</a>";
//  } 

?>