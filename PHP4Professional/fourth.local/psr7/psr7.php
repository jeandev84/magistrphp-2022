<?php

use App\Modules\Psr\Http\Message\Message;

require __DIR__ . '/autoload.php';


$message = new Message();

echo "<pre>", $message->getProtocolVersion(), "</pre>";
echo "<pre>", print_r($message->getHeaders()), "</pre>";
# echo ($message === $message); TRUE
echo "<pre>", $message->withProtocolVersion('1.0')->getProtocolVersion(), "</pre>";
# echo ($message->withProtocolVersion('1.0')->getProtocolVersion() === $message); FALSE
echo "<pre>", $message->getHeaderLine('Content-Type'), "</pre>";
echo "<pre>", $message->getBody(), "</pre>";
echo "<pre>", print_r(headers_list()), "</pre>";
