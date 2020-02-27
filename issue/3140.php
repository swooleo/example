<?php

$serv = new Swoole\Server("127.0.0.1", 9501, SWOOLE_PROCESS, SWOOLE_TCP); 

//监听连接进入事件
$serv->on('Connect', function ($serv, $fd) {  
    echo "Client: Connect.\n";
});

//监听数据接收事件
$serv->on('Receive', function (\Swoole\Server $serv, $fd, $from_id, $data) {
    echo "Receive ".$data."\n";
    $serv->send($fd, " Server: ".$data);
 });

 //监听连接关闭事件
$serv->on('Close', function ($serv, $fd) {
    echo "Client: Close.\n";
});

$port1 = $serv->listen("127.0.0.1", 9502, SWOOLE_SOCK_TCP);
$port1->set([
    'open_http_protocol' => true,    // 设置这个端口关闭http协议功能
    'open_eof_check' => true,
    "package_eof"    => "\r\n\r\n",
]);

$port1->on('Request', function(\Swoole\Http\Request $request, Swoole\Http\Response $response){
    echo "request: .{$request->getData()}\n";
});

$port2 = $serv->listen("127.0.0.1", 9503, SWOOLE_SOCK_TCP);
$port2->set([
    'open_websocket_protocol' => true,
]);

$port2->on('Message', function($serv, \Swoole\WebSocket\Frame $frame){
    $response = new \Swoole\WebSocket\Frame;
    $response->data = 'server';
    $serv->send($frame->fd, (string)$response);
});

//启动服务器
$serv->start();
