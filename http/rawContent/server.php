<?php
/*
 * @Author: your name
 * @Date: 2020-04-18 02:20:13
 * @LastEditTime: 2020-04-18 02:29:14
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/http/rawContent.php/server.php
 */

use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Http\Server;

$http = new Server('127.0.0.1', 9501, SWOOLE_BASE);
$http->set(['worker_num' => 1]);
$http->on('request', function (Request $request, Response $response) {
    if ($request->server['request_uri'] === '/rawContent') {
        $response->end($request->rawContent());
    } else {
        $response->end($request->getContent());
    }
});
$http->start();