<?php


/**
 * @param $variable
 * @return void
*/
if (! function_exists('dump')) {

    function dump($variable) {
        echo '<pre>';
        var_dump($variable);
        echo '</pre>';
    }

}


/**
 * @param $variable
 * @return void
*/

if (! function_exists('dd')) {

    function dd($variable) {
        dump($variable);
        die;
    }

}
