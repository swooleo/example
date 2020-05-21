<?php

$server = new Swoole\WebSocket\Server('127.0.0.1', 9501, SWOOLE_PROCESS, SWOOLE_SOCK_TCP);
$server->addListener('/tmp/qot_websocket_server.sock', null, SWOOLE_SOCK_UNIX_STREAM);
$server->set([
    'pid_file' => '/tmp/qot_websocket_server.pid',
    'worker_num' => 1,
]);
$server->on('WorkerStart', function (Swoole\WebSocket\Server $server, $worker_id) {
});
$server->on('open', function (Swoole\WebSocket\Server $server, Swoole\Http\Request $request) {
});
$server->on('request', function (Swoole\Http\Request $request, Swoole\Http\Response $response) {
    $response->status('302');
    $response->header('Location', 'https://www.baidu.com/');
    $response->end("");
});
$server->on('message', function (Swoole\WebSocket\Server $server, Swoole\WebSocket\Frame $frame) {
    var_dump($frame);
    foreach ($server->connections as $fd) {
        if ($fd == $frame->fd) {
            continue;
        }
        if (! $server->isEstablished($frame->fd)) {
            continue;
        }
        $server->push($fd, $frame->data);
    }
});
$server->on('close', function (Swoole\WebSocket\Server $server, $fd, $reactorId) {
});
$server->start();
