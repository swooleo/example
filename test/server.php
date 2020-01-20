<?php

use Swoole\Coroutine\Socket;

use function Co\run;

run(function () {
    $socket = new Socket(AF_INET, SOCK_STREAM, 0);
    $socket->bind('127.0.0.1', 9601);
    $socket->listen(128);

    while (true) {
        $conn = $socket->accept();
        go(function () use ($conn) {
            $data = $conn->recv();
            var_dump($data);
        });
    }
});
