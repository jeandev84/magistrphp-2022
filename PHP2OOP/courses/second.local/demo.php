<?php

// Автозагрузка классов
require_once __DIR__ . '/autoload.php';

/*
JSON:

$json = '{
  "result": [
     {"name": "John"},
     {"name": "Marry"}
  ]
}';

$object = json_decode($json, false);

var_dump($object);

foreach ($object->result as $item) {
     echo $item->name, "<hr>";
}
*/