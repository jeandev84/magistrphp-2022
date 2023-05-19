<?php

/*
ob_start() - стартует буферизацию вывода
ob_get_contents() - Возвращает содержимое буфера вывода
ob_end_clean() - Очищает (стирает) буфер вывода и отключает буферизацию вывода
ob_end_flush() - Сброс (отправка) буфера вывода и отключение буферизации вывода
ob_gzhandler() - callback-функция, используемая для gzip-сжатия буфера вывода при вызове ob_start
ob_iconv_handler() - Преобразует символы из текущей кодировки в кодировку выходного буфера
*/

function callback($buffer) {
  // заменить все яблоки апельсинами
  return (str_replace("яблоки", "апельсины", $buffer));
}


function write($buffer) {
   file_put_contents('text.txt', $buffer);
   return '';
}

ob_start("callback");


?>
<html>
<body>
<p>Это все равно что сравнить яблоки и апельсины.</p>
</body>
</html>
<?php

ob_end_flush();

// Сжать контент (Compress Content)
// https://www.php.net/manual/fr/function.ob-gzhandler.php
ob_start("ob_gzhandler");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>Это должно быть сжатой страницей.</p>
</body>
</html>