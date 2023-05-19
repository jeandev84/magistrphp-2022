<?php


# SPL - Standard PHP Library
# https://php.net/manual/ru/book.spl.php
# https://php.net/manual/en/filesystemiterator.construct.php

# Iterator

/*
$fi = new FilesystemIterator('.', FilesystemIterator::KEY_AS_FILENAME);
foreach ($fi as $n => $fileInfo) {
    echo "$n $fileInfo <hr>";
}
*/

$fi = new FilesystemIterator('.');

foreach ($fi as $fileInfo) {
    echo "$fileInfo";
    if ($fileInfo->isFile()) {
         echo " ( {$fileInfo->getExtension()})";
    }
    echo "<hr/>";
}




// FilesystemIterator
$filesystemIterator = new FilesystemIterator('.');

foreach ($filesystemIterator as $fileInfo) {
    echo "$fileInfo";
    if ($fileInfo->isFile()) {
        echo " ( {$fileInfo->getExtension()})";
    }
    echo "<hr/>";
}


class HtmlFilterIterator extends FilterIterator
{

    public function accept()
    {
        $fileInfo = $this->getInnerIterator()
            ->current();

        // ищем всё html файлы
        return preg_match("/\.html$/", $fileInfo);
    }
}

echo "<h2>HTML-файлы</h2>";
$iterator = new HtmlFilterIterator($filesystemIterator);
foreach ($iterator as $fileInfo) {
    echo $fileInfo, "<hr>";
}

// DZ: Вывод много-уровни массив