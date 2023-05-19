<?php

# https://php.net/manual/en/function.strncmp.php
/**
 * An example of a project-specific implementation.
 *
 * After registering this autoload function with SPL, the following line
 * would cause the function to attempt to load the \Foo\Bar\Baz\Qux class
 * from /path/to/project/src/Baz/Qux.php:
 *
 *      new \Foo\Bar\Baz\Qux;
 *
 * @param string $class The fully-qualified class name.
 * @return void
 */
spl_autoload_register(function ($class) {

    //echo "Класс: ", $class, "<hr/>";
    // project-specific namespace prefix
    $prefix = 'App\\Modules\\';
    // echo "Префикс: ", $prefix, "<hr/>";

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/src/';
    // echo "База директории: ", $base_dir, "<hr/>";

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    // echo "Длина префикса: ", $len, "<hr/>";

    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);
    // echo "Относительное название класса: ", $relative_class, "<hr/>";


    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = str_replace('\\', '/', $base_dir. $relative_class) . '.php';
    // echo "Файл для загрузки: ", $file, "<hr/>";

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});