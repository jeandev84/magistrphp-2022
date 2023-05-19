<?php

require_once '../vendor/autoload.php';
require_once '../news/NewsDB.class.php';
require_once 'App/Types.php';
require_once 'App/Type/QueryType.php';
require_once 'App/Type/NewsType.php';

use GraphQL\Type\Schema;
use GraphQL\GraphQL;

try {

	
    // Получение запроса
    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);
    $query = $input['query'];

    // Создание схемы
    $schema = new Schema([
        'query' => Types::query() // Мы только извлекаем данных
    ]);

    // Выполнение запроса
    $result = GraphQL::executeQuery($schema, $query)->toArray();
} catch (\Exception $e) {
    $result = [
        'error' => [
            'message' => $e->getMessage()
        ]
    ];
}

// Вывод результата
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($result);
