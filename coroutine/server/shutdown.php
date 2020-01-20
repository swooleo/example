<?php

use Swoole\Coroutine\Server;
use Swoole\Coroutine\Server\Connection;

use function Co\run;

run(function () {
    $server = new Server('127.0.0.1', 9501);
    $server->handle(function (Connection $conn) use ($server) {
        $data = $conn->recv();
        var_dump($data);
        $conn->close();
        $server->shutdown();
    });
    $server->start();
});
