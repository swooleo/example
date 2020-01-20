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
    'log_file' => '/dev/null',
    'send_yield' => true,
    'http_compression' => false,
    "worker_num" => 1,
]);
$http->on('workerStart', function () {
});
$http->on('request', function (Swoole\Http\Request $request, Swoole\Http\Response $response) {
    $data = str_repeat('a', 1 * 1024 * 1024);
    $data_len = strlen($data);
    $offset = 0;
    do {
        $send_bytes = min($data_len - $offset, 1 * 1024 * 1024);
        $response->write(substr($data, $offset, $send_bytes));
        $offset += $send_bytes;
    } while ($offset < $data_len);
    $response->end();
});
$http->start();