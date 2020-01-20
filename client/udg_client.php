<?php
/*
 * @Author: your name
 * @Date: 2020-01-15 10:58:46
 * @LastEditTime : 2020-01-17 01:28:45
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/client/client.php
 */

use Swoole\Coroutine\Client;

use function Co\run;

function generateData()
{
    return str_repeat('a', 42590);
}

run(function () {
    $socket = new  Swoole\Coroutine\Socket(AF_UNIX, SOCK_DGRAM, IPPROTO_IP);
    $socket->bind('/tmp/client.sock', 0);
    $socket->sendto('../server/server.sock', 0, generateData());
    var_dump($socket->errMsg);
});
