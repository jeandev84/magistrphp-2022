<?php
namespace components\Http;

class JsonResponse extends Response
{
    public function __construct(object|array $data, int $status = 200, array $headers = [])
    {
        $headers = array_merge($headers, ['Content-Type: application/json; charset=UTF-8']);

        parent::__construct(json_encode($data), $status, $headers);
    }
}