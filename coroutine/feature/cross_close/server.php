<?php

use Swoole\Coroutine;
use Swoole\Coroutine\Socket;

use function Swoole\Coroutine\run;

run(function () {
    $server = new Socket(AF_INET, SOCK_STREAM, IPPROTO_IP);
    $server->bind('127.0.0.1', 9501);
    $server->listen();
    Coroutine::create(function () use ($server) {
        $conn = $server->accept();
        $conn->recv();
        $conn->close();
        $server->close();
    });
});
