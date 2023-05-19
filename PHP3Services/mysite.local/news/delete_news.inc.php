<?php

$id = 1*$_GET["del"];

if( $news->deleteNews( $id)){
	header("Location: /news/news.php");	
} else $errMsg[] = "Произошла
ошибка при удалении новости";


?>