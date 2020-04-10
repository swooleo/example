<?php
/*
 * @Author: your name
 * @Date: 2020-01-21 07:57:09
 * @LastEditTime: 2020-04-10 08:33:49
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/websocket/client.php
 */

use Swoole\Coroutine\Http\Client;

use function Co\run;

run(function () {
    $cli = new Client("127.0.0.1", 9501);
    $ret = $cli->upgrade("/websocket");

    if (!$ret) {
        echo "ERROR\n";
        return;
    }

    $cli->push("111");
    $data = $cli->recv();
    var_dump($data);
});
