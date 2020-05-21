<?php

use Swoole\Server;

$serv = new Server('127.0.0.1', 9501);

$serv->set([
    'worker_num' => 1,
]);

$serv->on('Receive', function (Swoole\Server $serv, int $fd, int $reactorId, string $data) {
    $a = 1;
    var_dump($data);
    $b = 2;
});

$serv->start();
