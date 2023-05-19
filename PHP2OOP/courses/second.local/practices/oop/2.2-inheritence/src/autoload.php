<?php

// // Автозагрузка классов
// const ROOT = __DIR__."/src";

spl_autoload_register(function ($class) {
    @require_once __DIR__."/$class.php";
});