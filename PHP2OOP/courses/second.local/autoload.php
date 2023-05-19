<?php

// Автозагрузка классов

// echo "Автозагрузка классов ...<hr/>";
spl_autoload_register(function ($class) {
    @require_once __DIR__."/src/$class.php";
    echo "$class", "<hr>";
});

// echo "Конец автозагрузки классов ...<hr/>";