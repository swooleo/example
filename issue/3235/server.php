<?php
/*
 * @Author: your name
 * @Date: 2020-04-10 08:30:04
 * @LastEditTime: 2020-04-10 08:30:05
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: /swoole/issue/3235/server.php
 */

$server = new Swoole\WebSocket\Server("0.0.0.0", 9501, SWOOLE_BASE);
$server->set([
    'worker_num'    =>  2,
]);

$server->on('open', function (Swoole\WebSocket\Server $server, $request) {
    echo "server: handshake success with fd{$request->fd}\n";
});

$server->on('message', function (Swoole\WebSocket\Server $server, $frame) {
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    $server->push($frame->fd, "this is server");

    var_dump('workerId:' . $server->worker_id);
    var_dump('port connections:' . count($server->ports[0]->connections));
    foreach($server->ports[0]->connections as $fd)
    {
        var_dump($fd);
    }
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();