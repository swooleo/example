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
    $cli = new Swoole\Coroutine\Http\Client('127.0.0.1', 9100);
    $cli->setHeaders([
        'Host' => "localhost",
        "User-Agent" => 'Chrome/49.0.2587.3',
    ]);
    $cli->get('/');
    var_dump(strlen($cli->body));
    $cli->close();
});
