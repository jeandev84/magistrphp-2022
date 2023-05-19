<?php

if ( !empty($_POST["title"]) ){
 $title = strip_tags($_POST["title"]);
} else $errMsg[] = "Укажите title";

if ( !empty($_POST["description"]) ){
 $description = strip_tags($_POST["description"]);
} else $errMsg[] = "Укажите description";

if ( !empty($_POST["source"]) ){
 $source = strip_tags($_POST["source"]);
} else $errMsg[] = "Укажите source";

if ( !empty($_POST["category"]) ){
 $category = 1*$_POST["category"];
} else $errMsg[] = "Укажите category";

//echo !count($errMsg);
//print_r($errMsg);
if ( !$errMsg && $news->saveNews($title, $category, $description, $source) ){
	$news->createRSS();
    header("Location: /news/news.php");
} else {
	$errMsg[] = "Произошла ошибка при добавлении новости";
};





?>