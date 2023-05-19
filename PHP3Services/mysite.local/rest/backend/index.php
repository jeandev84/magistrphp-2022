<?php
require_once "../news/NewsDB.class.php";
require_once "../news/News.class.php";

// PHP не работает напрямую с данными PUT, PATCH или DELETE
function getRequestData($method) {

    // GET 
    if ($method === 'GET') return $_GET;
	// POST, PUT, PATCH или DELETE
	else  return file_get_contents('php://input');

    return $data;
}

// Определяем метод запроса
$method = $_SERVER['REQUEST_METHOD'];

// Получаем данные из запроса
$requestData = getRequestData($method);


// /news/id
// /news

// /customer/id
// /customer

// Разбираем url
$url = (isset($_GET['path'])) ? $_GET['path'] : '';
$url = rtrim($url, '/');
$urls = explode('/', $url);

// news, customer : название сущности
// Определяем сущность (entity) и url data
$entity = $urls[0];
$urlData = array_slice($urls, 1);

// Подключаем файл-роутер и запускаем главную функцию
include_once 'entities/' . $entity . '.php';
entity($method, $urlData, $requestData);
