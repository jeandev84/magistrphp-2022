<?php

$day = 2; // date('d')

if ($day == 1) {
    echo "Понедельник";
} elseif ($day == 2) {
    echo "Вторник";
} elseif ($day == 3) {
    echo "Среда";
} elseif ($day == 4) {
    echo "Четверг";
} elseif ($day == 5) {
    echo "Пятница";
}elseif ($day == 6) {
    echo "Суббота";
}elseif ($day == 7) {
    echo "Воскресенье";
} else {
    echo "Неизвестный день";
}


$i = 1;
switch ($i) {
    case 0: echo "Результат: 0"; break;
    case 1: echo "Результат: 1"; break;
    case 2: echo "Результат: 2"; break;
    default: echo "Результат: Много";
}
