<?php

use Swoole\Coroutine\Server;

use function Co\run;

run(function () {
    $server = new Server('127.0.0.1', 9501);
    $server->set([
        'open_eof_check' => true,
        'package_eof' => "\r\n\r\n",
        'package_max_length' => 1024 * 1024 * 2, //2M
    ]);
});