<?php

use GraphQL\Type\Definition\Type;

/**
 * Class Types
 * Реестр и фабрика типов для GraphQL
 */
class Types
{
    /**
     * @var QueryType
     */
    private static $query;

    /**
     * @var NewsType
     */
    private static $news;

    /**
     * @return QueryType
     */
    public static function query()
    {
        return self::$query ?: (self::$query = new QueryType());
    }

    /**
     * @return NewsType
     */
    public static function news()
    {
        return self::$news ?: (self::$news = new NewsType());
    }

    /**
     * @return \GraphQL\Type\Definition\ScalarType
     */
    public static function int()
    {
        return Type::int();
    }

    /**
     * @return \GraphQL\Type\Definition\ScalarType
     */
    public static function string()
    {
        return Type::string();
    }

    /**
     * @param \GraphQL\Type\Definition\Type $type
     * @return \GraphQL\Type\Definition\ListOfType
     */
    public static function listOf($type)
    {
        return Type::listOf($type);
    }
}