<?php

use Swoole\Coroutine;
use Swoole\Coroutine\Http\Server;
use Swoole\Coroutine\Socket;
use Swoole\Http\Request;
use Swoole\Http\Response;

const REQUEST = "GET / HTTP/1.1\r\n\r\n";
Coroutine\run(function () {
    $server = new Server('127.0.0.1', 0);
    Coroutine::create(function () use ($server) {
        $server->handle('/', function (Request $request, Response $response) use ($server) {
            static $count = 0;
            if (++$count === 1 * 4) {
                echo "DONE\n";
                $server->shutdown();
            }
        });
        $server->start();
    });
    for ($c = 1; $c--;) {
        Coroutine::create(function () use ($server) {
            $socket = new Socket(AF_INET, SOCK_STREAM, IPPROTO_IP);
            if ($socket->connect('127.0.0.1', $server->port, -1)) {
                $socket->sendAll(str_repeat(REQUEST, 4));
            } else {
                throw new RuntimeException('Connect failed: ' . $socket->errMsg);
            }
        });
    }
});
