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
]);
$http->on('workerStart', function () {
});
$http->on('request', function (Swoole\Http\Request $request, Swoole\Http\Response $response) {
    $data = str_repeat('a', 1 * 1024 * 1024);
    $response->setCookie('name', 'value1');
    $response->setCookie('name', 'value2');

    $response->end();
});
$http->start();
