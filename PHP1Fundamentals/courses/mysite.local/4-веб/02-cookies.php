<?php

// Cookie

/*
$TestCookie = 1;

if( isset($_COOKIE['TestCookie']) ){
  $TestCookie = (int)$_COOKIE['TestCookie'];
  $TestCookie++;
}

setcookie("TestCookie",  $TestCookie, time() + 3600 );
echo $TestCookie;
*/

// Счетик для того чтобы знать сколько раз страница открывали

$visitCounter = 0;

if(isset($_COOKIE['visitCounter'])) {
    $visitCounter = (int)$_COOKIE['visitCounter'];
}

$visitCounter = $visitCounter + 1;
setcookie("visitCounter", $visitCounter, time() + 3600);

echo "Visits: $visitCounter";