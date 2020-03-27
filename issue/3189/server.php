<?php

use Swoole\Coroutine;
use Swoole\Coroutine\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;
use function Swoole\Coroutine\run;

run(function () {
    $server = new Server('0.0.0.0', 9501);
    $server->handle('/', function (Request $request, Response $response) {
        echo sprintf('Content length: %d' . PHP_EOL, strlen($request->getData()));
        echo sprintf('Files: %d' . PHP_EOL, (int) $request->files);

        // 模拟长时间IO
        Coroutine::sleep(1); 

        $response->end('ok');
    });
    $server->start();
});