<?php
//require_once '../news/NewsDB.class.php';

use GraphQL\Type\Definition\ObjectType;

class QueryType extends ObjectType
{
    

	
	public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                    'news' => [
                        'type' => Types::news(),
                        'description' => 'Возвращает новость по id',
                        'args' => [
                            'id' => Types::int()
                        ],
                        'resolve' => function ($root, $args) {
 				            $db = new NewsDB();
	                        return $db->getNewsById($args['id']);
                        }
                    ],
                    'allNews' => [
                        'type' => Types::listOf(Types::news()),
                        'description' => 'Список новостей',
                        'resolve' => function () {
                            $db = new NewsDB();
                            return $db->getNews();
                        }
                    ]
                ];
            }
        ];
        parent::__construct($config);
    }
}