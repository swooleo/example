<?php

Co\Run(function () use ($pm) {
    $cli = new Swoole\Coroutine\Client(SWOOLE_SOCK_TCP);
    $r = $cli->connect('127.0.0.1', 9501, 1);
    $cli->send("test");
    $data = $cli->recv();
    $cli->send('shutdown');
    $cli->close();
    echo "SUCCESS\n";
});