<?php

use Swoole\Coroutine;
use Swoole\Coroutine\Client;
use Swoole\Server;

$serv = new Server('127.0.0.1', 9501);

Coroutine::create(function () {
    $client = new Client(SWOOLE_SOCK_TCP);
    $client->connect('localhost', 8088);
});

$serv->on('Receive', function () {
});

$serv->start();
