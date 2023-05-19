<?php

// echo "<pre>GET: ",print_r($_GET),"</pre>";
// echo "<pre>POST: ",print_r($_POST),"</pre>";

$username = '';
$age      = '';

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $username = trim(htmlspecialchars($_POST['name']));
    $age = (int)$_REQUEST['age'];

    if (! empty($username))
        echo "<h1>Здравствуйте, $username. Вам $age лет.</h1>";
    else
        echo "<h1>Здравствуйте</h1>";
}

?>


<h2>Форма с методом POST</h2>
<form method="POST">
    <div>Ваше имя: <input type="text" name="name" value="<?= $username ?>"/></div>
    <div>Ваш возраст: <input type="number" name="age" value="<?= $age ?>"/></div>
    <div><input type="submit" value="Привет"/></div>
</form>


<!--
<h2>Форма с методом GET</h2>
<form method="GET">
 <div>Ваше имя: <input type="text" name="name" /></div>
 <div>Ваш возраст: <input type="number" name="age" /></div>
 <div><input type="submit" /></div>
</form>
-->
