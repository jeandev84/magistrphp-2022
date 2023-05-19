<?php


/**
 * @param $variable
 * @return void
*/
function dump($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}


/**
 * @param $variable
 * @return void
*/
function dd($variable) {
    dump($variable);
    die;
}


/**
 * @param array $variable
 * @return void
*/
function pretty(array $variable) {
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
}