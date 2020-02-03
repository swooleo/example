<?php
/*
 * @Author: your name
 * @Date: 2020-02-03 02:19:25
 * @LastEditTime: 2020-02-03 02:19:26
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: /swoole/issue/3079.php
 */

use Swoole\Coroutine\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;
use function Swoole\Coroutine\run;

run(function () {
    $server = new Server('0.0.0.0', 9501);
    $server->handle('/', function (Request $request, Response $response) {
        var_dump(strlen($request->getData()));
        var_dump(strlen($request->rawContent()));

        file_put_contents('data.txt', $request->getData());
        file_put_contents('raw.txt', $request->rawContent());
    });
    $server->start();
});
