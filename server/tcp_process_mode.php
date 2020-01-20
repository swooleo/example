<?php
/*
 * @Author: your name
 * @Date: 2020-01-15 10:33:28
 * @LastEditTime : 2020-01-17 10:48:24
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/server/process_mode.php
 */

use Swoole\Server;

$serv = new Server("127.0.0.1", 9501);
$serv->set([
    "worker_num" => 1,
    "open_eof_check" => true,
    "package_eof" => "\r\n",
]);

$serv->on('connect', function (Server $serv, $fd) {
    echo "Client:Connect.\n";
});

$serv->on('receive', function (Server $serv, $fd, $reactor_id, $data) {
    var_dump(strlen($data));
});

$serv->on('close', function (Server $serv, $fd) {
    echo "Client: Close.\n";
});

$serv->start();
