<?php

// XML (Extensible Markup Language)

// DTD (Document Type Definition)
/*
Это означает что этот документ должен содержать "catalog"
а у "catalog" содержать не менее одного "book" (book+ это означает)
<!ELEMENT catalog (book+)>
*/

// XMLReader
$reader = new XMLReader('catalog.xml');

// Если файл на удаленный сервер нужно использовать
$reader->open('http://remotesite.com/files/catalog.xml');


// XMLWriter
$writer = new XMLWriter();