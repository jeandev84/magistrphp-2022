<?php

// https://habr.com/ru/articles/182352/
function startSession() {
    // Таймаут отсутствия активности пользователя (в секундах)
    $sessionLifetime = 300;

    if ( session_id() ) return true;
    // Устанавливаем время жизни куки
    ini_set('session.cookie_lifetime', $sessionLifetime);
    // Если таймаут отсутствия активности пользователя задан, устанавливаем время жизни сессии на сервере
    // Примечание: Для production-сервера рекомендуется предустановить эти параметры в файле php.ini
    if ( $sessionLifetime ) ini_set('session.gc_maxlifetime', $sessionLifetime);
    if ( session_start() ) {
        setcookie(session_name(), session_id(), time()+$sessionLifetime);
        return true;
    }
    else return false;
}