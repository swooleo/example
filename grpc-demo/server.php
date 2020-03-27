<?php

use RPC\Server;

use function Swoole\Coroutine\run;

require __DIR__ . '/vendor/autoload.php';

run(function () {
    $serv = new Server('127.0.0.1', 9501);
    $serv->start();
});
