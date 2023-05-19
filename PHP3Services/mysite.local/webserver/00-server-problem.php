<?php
set_time_limit(0);

$address = '176.9.117.136';
$port = 9000;

$sock = socket_create(AF_INET, SOCK_STREAM, 0);
socket_bind($sock, $address, $port) or die('Could not bind to address');

while(1)
{
    socket_listen($sock);
    $client = socket_accept($sock);

    $input = socket_read($client, 1024);
    echo $input;

    $output = 'URL: http://ip-of-my-server:9000/
HTTP/1.1 200 OK
Date: Tue, 10 Jul 2012 16:58:23 GMT
Server: TestServer/1.0.0 (PHPServ)
Last-Modified: Fri, 06 Jul 2012 14:29:58 GMT
ETag: "13c008e-1b9-4c42a193de580"
Accept-Ranges: bytes
Content-Length: 441
Vary: Accept-Encoding
Content-Type: text/html

';
    socket_write($client, $output);

    socket_close($client);
}

socket_close($sock);
