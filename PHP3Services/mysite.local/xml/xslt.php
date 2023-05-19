<?php
// for HTML FORMAT
header("Content-Type: text/html;charset=utf-8");	

// for JSON FORMAT
// header("Content-Type: application/json;charset=utf-8");

//Создание объекта XML
$xml = new DOMDocument();

//Загрузка XML документа
$xml->load("catalog.xml");

//Создание объекта XSL
$xsl = new DOMDocument();

// Загрузка XSL документа HTML
$xsl->load("catalog.xsl");

//Загрузка XSL документа JSON
// $xsl->load("catalog_json.xsl");

//Создание XSLT парсера
 $proc = new XSLTProcessor();

//Загрузка XSL объекта
$proc->importStylesheet($xsl);

//Парсинг
echo $proc->transformToXml($xml);
?>