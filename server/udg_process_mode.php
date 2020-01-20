<?php
/*
 * @Author: your name
 * @Date: 2020-01-15 10:33:28
 * @LastEditTime : 2020-01-16 14:24:59
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/server/process_mode.php
 */

use Swoole\Server;

$serv = new Server(__DIR__."/server.sock", 9501, SWOOLE_PROCESS, SWOOLE_UNIX_DGRAM);
$serv->set([
    "worker_num" => 1,
]);

$serv->on('connect', function (Server $serv, $fd) {
    echo "Client:Connect.\n";
});

$serv->on('receive', function (Server $serv, $fd, $reactor_id, $data) {
    $serv->send($fd, 'Swoole: '.$data);
    $serv->close($fd);
});

$serv->on('Packet', function (Server $serv, $data, $addr) {
    var_dump(strlen($data));
    $serv->send($addr['address'], "hello", $addr['server_socket']);
});

$serv->on('close', function (Server $serv, $fd) {
    echo "Client: Close.\n";
});

$serv->start();
