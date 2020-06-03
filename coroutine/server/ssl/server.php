<?php

use Swoole\Coroutine\Server;
use Swoole\Coroutine\Server\Connection;

use function Swoole\Coroutine\run;

run(function () {
    $server = new Server('127.0.0.1', 9501, true);
    $server->set([
        'ssl_cert_file' => __DIR__ . '/server.crt',
        'ssl_key_file' => __DIR__ . '/server.key',
    ]);
    $server->handle(function (Connection $conn) {
        $data = $conn->recv();
        $conn->send('Swoole: '.$data);
    });
    $server->start();
});
