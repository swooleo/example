<?php
/*
 * @Author: your name
 * @Date: 2020-01-19 01:35:17
 * @LastEditTime : 2020-01-19 01:49:53
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/http/server.php
 */

$http = new Swoole\Http\Server('0.0.0.0', 9501, SWOOLE_PROCESS);

$http->set([
    "worker_num" => 1,
    'document_root' => '/root/codeDir/phpCode/swoole/http',
    'enable_static_handler' => true,
    // 'http_index_files' => ['index.html', 'index.txt'],
    'http_autoindex' => true,
]);

$http->on('request', function (Swoole\Http\Request $request, Swoole\Http\Response $response) {
});

$http->start();
