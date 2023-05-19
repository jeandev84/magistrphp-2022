<?php

$json = '{"result": [
  {"name": "John"},
  {"name": "Mary"}
]}';
$object = json_decode($json, false);
foreach($object->result as $item)
{
    echo $item->name, '<hr />';
}
