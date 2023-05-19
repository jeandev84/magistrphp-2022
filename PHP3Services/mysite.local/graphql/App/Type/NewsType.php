<?php

use GraphQL\Type\Definition\ObjectType;

/**
 * Class NewsType
 *
 * Тип News для GraphQL
 *
 * @package App\Type
 */
class NewsType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'description' => 'Новость',
            'fields' => function() {
                return [
                    'id' => [
                        'type' => Types::int(),
                        'description' => 'Идентификатор новости'
                    ],
                    'title' => [
                        'type' => Types::string(),
                        'description' => 'Заголовок новости'
                    ],
                    'description' => [
                        'type' => Types::string(),
                        'description' => 'Текст новости'
                    ],
                    'source' => [
                        'type' => Types::string(),
                        'description' => 'Источник новости'
                    ],
                    'datetime' => [
                        'type' => Types::int(),
                        'description' => 'Дата/время обновления '
                    ]
                ];
            }
        ];
        parent::__construct($config);
    }
}