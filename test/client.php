<?php

use Swoole\Coroutine\Socket;

$socket = new Socket(AF_INET, SOCK_STREAM, 0);

go(function () use ($socket) {
    for ($i = 1; $i < 65536; $i++) {
        if ($socket->connect('127.0.0.1', $i)) {
            echo "connected\n";
            break;
        }
    }

    var_dump($i);
});
