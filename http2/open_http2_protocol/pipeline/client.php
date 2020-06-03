<?php
/*
 * @Author: your name
 * @Date: 2020-01-19 01:35:53
 * @LastEditTime : 2020-01-19 02:28:49
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/http/client.php
 */

Swoole\Coroutine\run(function () {
    $cli = new Swoole\Coroutine\Http2\Client('127.0.0.1', 80);
    $cli->connect();
    $request = new Swoole\Http2\Request;
    $request->pipeline = true;
    $request->headers = [
        'user-agent' => 'Chrome/49.0.2587.3',
        'accept' => 'text/html,application/xhtml+xml,application/xml',
        'accept-encoding' => 'gzip'
    ];
    $request->data = 'http2 client';
    $streamId = $cli->send($request);
    $cli->write($streamId, $request->data, false);
    $cli->write($streamId, $request->data, true);
    $response = $cli->recv();
    var_dump($response);
    $cli->close();
});
