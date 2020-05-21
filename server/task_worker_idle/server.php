<?php

use Swoole\Server;

$serv = new Server("127.0.0.1", 9501, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

$serv->set([
    'reactor_num' => 1,
    'worker_num' => 1,
    'task_worker_num' => 1,
]);

$serv->on('Packet', function (Server $serv, string $data, array $clientInfo) {
    $serv->task($data);
});

// 处理异步任务(此回调函数在task进程中执行)
$serv->on('task', function (Server $serv, $task_id, int  $from_id, string $data) {
    var_dump($data);
    sleep(1);
});

$serv->start();
