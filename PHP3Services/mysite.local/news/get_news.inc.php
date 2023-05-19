<?php

 $items = $news->getNews();
 //print_r($items);
 foreach($items as $item):
 ?>
	 <h3><?= $item["title"]?></h3>
	 <a href="?del=<?= $item["id"]?>">Удалить</a>
	 <p><?= $item["description"]?></p>
	 <code><?= $item["source"]?></code>
<?php	 
 endforeach;
?>