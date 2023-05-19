<?php

function startSession($isUserActivity=true) {
    $sessionLifetime = 300;

    if ( session_id() ) return true;
    // Устанавливаем время жизни куки до закрытия браузера (контролировать все будем на стороне сервера)
    ini_set('session.cookie_lifetime', 0);
    if ( ! session_start() ) return false;

    $t = time();

    if ( $sessionLifetime ) {
        // Если таймаут отсутствия активности пользователя задан,
        // проверяем время, прошедшее с момента последней активности пользователя
        // (время последнего запроса, когда была обновлена сессионная переменная lastactivity)
        if ( isset($_SESSION['lastactivity']) && $t-$_SESSION['lastactivity'] >= $sessionLifetime ) {
            // Если время, прошедшее с момента последней активности пользователя,
            // больше таймаута отсутствия активности, значит сессия истекла, и нужно завершить сеанс
            destroySession();
            return false;
        }
        else {
            // Если таймаут еще не наступил,
            // и если запрос пришел как результат активности пользователя,
            // обновляем переменную lastactivity значением текущего времени,
            // продлевая тем самым время сеанса еще на sessionLifetime секунд
            if ( $isUserActivity ) $_SESSION['lastactivity'] = $t;
        }
    }

    return true;
}