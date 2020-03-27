<?php

use Swoole\Http\Response;
use Swoole\Http\Server;

$http = new Server('0.0.0.0', 9501);

$http->set([
    'enable_static_handler' => true,
    'document_root' => __DIR__,
]);

$http->on("request", function ($request, Response $response) {
    if ($request->server['path_info'] == '/') {
        $response->redirect('/test.jpg');
    }
});

$http->start();