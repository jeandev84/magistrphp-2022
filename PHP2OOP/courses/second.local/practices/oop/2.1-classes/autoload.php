<?php

// Тренажор языков (PHP, Java, Python, Java, Go ...)
// https://codewars.com/?language=php
// https://leetcode.com

// Автозагрузка

spl_autoload_register(function ($class) {
    @require_once __DIR__ . "/src/$class.php";
});