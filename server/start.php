<?php
/*
 * @Author: your name
 * @Date: 2020-01-14 09:25:47
 * @LastEditTime : 2020-01-14 09:28:17
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/server/on.php
 */

use Swoole\Server;

$serv = new Server("127.0.0.1", 9501);

$serv->set([
    'log_file' => '',
]);

$serv->on('connect', function (Server $serv, $fd) {
    echo "Client:Connect.\n";
});

$serv->on('receive', function (Server $serv, $fd, $reactor_id, $data) {
    $serv->send($fd, 'Swoole: '.$data);
    $serv->close($fd);
});

$serv->on('close', function (Server $serv, $fd) {
    echo "Client: Close.\n";
});

$serv->start();
