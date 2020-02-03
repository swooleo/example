<?php
/*
 * @Author: your name
 * @Date: 2020-01-19 01:35:17
 * @LastEditTime : 2020-01-19 01:49:53
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/http/server.php
 */

$http = new Swoole\Http\Server('127.0.0.1', 80, SWOOLE_PROCESS);
$http->set([
    "worker_num" => 1,
    'open_http2_protocol' => true
]);
$http->on('workerStart', function () {
});
$http->on('request', function (Swoole\Http\Request $request, Swoole\Http\Response $response) {
    $data = str_repeat('a', 1024);
    $response->header('content-type', 'application/srpc');
    $response->header('trailer', 'srpc-status, srpc-message');
    $trailer = [
        "srpc-status" => '0',
        "srpc-status" => '1',
    ];
    foreach ($trailer as $trailer_name => $trailer_value) {
        $response->trailer($trailer_name, $trailer_value);
    }
    $response->end($data);
});
$http->start();
