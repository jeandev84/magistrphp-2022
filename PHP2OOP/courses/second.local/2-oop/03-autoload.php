<?php
// Standard PHP Library
// https://www.php.net/manual/en/function.spl-autoload-register.php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

/*
spl_autoload_register(function ($class_name) {
    include 'classes/'. $class_name . '.php';
});
*/

$obj  = new MyClass1();
$obj2 = new MyClass2();
?>