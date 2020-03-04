<?php
/*
 * @Author: your name
 * @Date: 2020-01-21 07:57:09
 * @LastEditTime: 2020-03-04 08:25:37
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/websocket/client.php
 */

use Swoole\Coroutine;
use Swoole\Coroutine\Http\Client;

use function Co\run;

run(function () {
    $cli = new Client("127.0.0.1", 9501);
    $ret = $cli->upgrade("/websocket");

    $data = file_get_contents('gzdata');

    if (!$ret) {
        echo "ERROR\n";
        return;
    }

    $cli->push($data);
    $data = $cli->recv();
    var_dump($data);
});
