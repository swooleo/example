<?php

use Swoole\Server;

$serv = new Server("127.0.0.1", 9501, SWOOLE_PROCESS, SWOOLE_TCP | SWOOLE_SSL);

$serv->set([
    'worker_num' => 1,
    'ssl_cert_file' => __DIR__ . '/server.crt',
    'ssl_key_file' => __DIR__ . '/server.key',
]);

$serv->on('connect', function (Server $serv, $fd) {
    echo "Client:Connect.\n";
});

$serv->on('receive', function (Server $serv, $fd, $reactor_id, $data) {
    $serv->send($fd, 'Swoole: '.$data);
});

$serv->on('close', function (Server $serv, $fd) {
    echo "Client: Close.\n";
});

$serv->start();
