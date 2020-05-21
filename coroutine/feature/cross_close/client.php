<?php

use Swoole\Coroutine;
use Swoole\Coroutine\Client;

Coroutine::create(function () {
    $cli = new Client(SWOOLE_SOCK_TCP);
    $cli->connect('127.0.0.1', 9501);
    $cli->exportSocket()->setOption(SOL_SOCKET, SO_SNDBUF, 8192);
    $cli->exportSocket()->setOption(SOL_SOCKET, SO_RCVBUF, 8192);

    Coroutine::create(function () use ($cli) {
        Coroutine::sleep(0.001);
        $cli->close();
    });
    Coroutine::create(function () use ($cli) {
        $cli->send(str_repeat('S', 16));
    });
    Coroutine::create(function () use ($cli) {
        $cli->recv();
    });
});