<?php

use Swoole\Coroutine\Server;
use Swoole\Constant;
use Swoole\Coroutine\Server\Connection;
use Swoole\Process\Pool;

$pool = new Pool(2);
$pool->set(['enable_coroutine' => true]);
$pool->on(Constant::EVENT_WORKER_START, function ($pool, $id) {
    $server = new Server('127.0.0.1', 9501, false, true);
    $server->handle(function (Connection $conn) {
        $data = $conn->recv();
        var_dump($data);
        $conn->close();
    });
    $server->start();
});
$pool->start();
