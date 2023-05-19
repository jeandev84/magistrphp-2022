<?php

// Буферизация
// Записать содержимое HTML контент на файл "text.txt"
function write($buffer) {
    // file_put_contents('cache/text.txt', $buffer);
    file_put_contents('text.txt', $buffer);
    return '';
}

ob_start("write");
?>

    <html>
    <body>
    <p>Это все равно что сравнить яблоки и апельсины.</p>
    </body>
    </html>

<?php
ob_end_flush();
