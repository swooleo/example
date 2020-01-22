<?php
/*
 * @Author: your name
 * @Date: 2020-01-21 02:09:01
 * @LastEditTime : 2020-01-21 08:04:06
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/websocket/server.php
 */

 use Swoole\WebSocket\Server;

$server = new Server("0.0.0.0", 9501);

$server->set([
    "worker_num" => 1,
]);

$server->on('open', function (Server $server, $request) {
    echo "server: handshake success with fd{$request->fd}\n";
});

$server->on('message', function (Server $server, $frame) {
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    $server->push($frame->fd, "this is server\n");
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();