<?php
class Point {
    protected int $x;
    protected int $y;

    public function __construct(int $x, int $y = 0) {
        $this->x = $x;
        $this->y = $y;
        echo 'Объект инициализирован...<br/>';
    }


    public function __destruct()
    {
        $this->x = 0;
        $this->y = 0;
        echo 'Объект уничтожен...<br/>';
    }
}
/*
class Point {
    public function __construct(protected int $x, protected int $y = 0) {
    }
}
*/

// Передаём оба параметра.
$p1 = new Point(4, 5);
// Передаём только обязательные параметры. Для $y используется значеие по умолчанию 0.
$p2 = new Point(4);
// Вызываем с именованными параметрами (начиная с PHP 8.0):
$p3 = new Point(y: 5, x: 4);


?>