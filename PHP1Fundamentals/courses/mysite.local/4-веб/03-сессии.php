<?php

session_start();

if( isset($_GET['clear']) ){
  session_regenerate_id();
  unset($_SESSION['counter']);
  session_destroy();
  header('Location: /');
  die;
}


// Счетик
$_SESSION['counter']++;

echo $_SESSION['counter'], '<hr />';

echo session_name(), '<hr />';
echo session_id(), '<hr />';


?>

<a href="?clear">Сбросить</a>