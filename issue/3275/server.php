<?php

use Swoole\Coroutine\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;

use function Swoole\Coroutine\run;

run(function () {
    $server = new Server("127.0.0.1", 9501, false);
    $server->handle('/', function (Request $request, Response $response) {
        var_dump($request->server['remote_addr']);
        var_dump($request->server['remote_port']);
    });
    $server->start();
});