<?php

// https://www.php.net/manual/en/function.session-id.php
function startSession($isUserActivity=true, $prefix=null) {
    //...
    if ( session_id() ) return true;
    // Если в параметрах передан префикс пользователя,
    // устанавливаем уникальное имя сессии, включающее этот префикс,
    // иначе устанавливаем общее для всех пользователей имя (например, MYPROJECT)
    session_name('MYPROJECT'.($prefix ? '_'.$prefix : ''));
    ini_set('session.cookie_lifetime', 0);
    if ( ! session_start() ) return false;
    //...
}