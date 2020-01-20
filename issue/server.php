<?php

$http = new Swoole\Http\Server("127.0.0.1", 9502);
$http->on('request', function ($request, $response) {
    if ($request->server['request_method'] == 'HEAD') {
        $response->status(200);
        $response->header('Content-Length', 0);
        $response->end();
        return;
    }
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
});
$http->start();
