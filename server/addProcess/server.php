<?php

use Swoole\Server;

$serv = new Server('127.0.0.1', 9501);
$process = new \Swoole\Process(function ($process) use ($serv) {
    while (1) {
        $msg = json_decode($process->read(), true);
        $serv->send($msg['fd'], $msg['data']);
    }
});
$serv->set([
    "worker_num" => 1,
]);

$serv->on("WorkerStart", function (Server $serv) {
});

$serv->on("Receive", function (Server $serv, $fd, $rid, $data) use ($process) {
    if (trim($data) == 'shutdown') {
        $serv->shutdown();
        return;
    } else {
        $process->write(json_encode(['fd' => $fd, 'data' => $data]));
    }
});

$serv->addProcess($process);

$serv->start();