<?php

use Swoole\WebSocket\Server;
use Swoole\WebSocket\Frame;

$serv = new Server('127.0.0.1', 9501, SWOOLE_PROCESS);
$serv->set([
    'worker_num' => 1,
]);
$serv->on('WorkerStart', function () {
});
$serv->on('Message', function (Server $serv, Frame $frame) {
    var_dump($frame->data);
    if ($frame->data == 'shutdown') {
        $serv->disconnect($frame->fd, 4000, 'shutdown received');
    }
});
$serv->start();