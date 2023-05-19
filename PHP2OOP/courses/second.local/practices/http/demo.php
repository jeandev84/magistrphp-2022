<?php

// Скачать файл
/*
header('Content-Disposition: attachment; filename="price.html"'); // Указание на загрузку

echo "<h1>Прайс</h1>";

for ($i = 0; $i < 10; $i++) {
    echo "<div>Товар$i: ", 100 * $i,"</div>";
}
*/


// Обновить страничку каждую 5 секунду
// header("Refresh:5; url=demo.php?id=123");
// print_r($_GET);


// Буферизация
// Записать содержимое HTML контент на файл "text.txt"
function write($buffer) {
    file_put_contents('text.txt', $buffer);
    return '';
}

ob_start("write");

// compress page
ob_start("write");
// ob_start("ob_gzhandler");
echo "
<!DOCTYPE html>
<html>
<body>
<p>Это все равно что сравнить яблоки и апельсины.</p>
</body>
</html>
";

ob_end_flush();


// Regex Expression (Регулярнное выражение)
$string = 'April 15, 2022';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '${2} ${1} $3';

// Result: 15 April 2022
echo preg_replace($pattern, $replacement, $string);