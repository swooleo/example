<?php
/*
 * @Author: your name
 * @Date: 2020-02-27 02:12:04
 * @LastEditTime: 2020-02-27 02:28:09
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/server/open_websocket_protocol.php
 */

use Swoole\Http\Server;
use Swoole\WebSocket\Frame;

$serv = new Server('127.0.0.1', 9501);
$serv->set([
    // 'open_http_protocol' => true,
    'open_websocket_protocol' => true
]);
$serv->on('message', function (Server $server, Frame $frame) {
    $response = new Frame;
    $response->data = 'hello swoole';
    $server->send($frame->fd, (string)$response);
});
$serv->start();