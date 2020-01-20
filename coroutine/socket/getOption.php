<?php
/*
 * @Author: your name
 * @Date: 2020-01-19 07:50:03
 * @LastEditTime : 2020-01-19 07:54:11
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/coroutine/socket/getOption.php
 */

use Swoole\Coroutine\Socket;

use function Co\run;

run(function () {
    $socket = new Socket(AF_INET, SOCK_STREAM);
    var_dump($socket->getOption(SOL_SOCKET, SO_RCVBUF));
    var_dump($socket->getOption(SOL_SOCKET, SO_SNDBUF));

    $socket = new Socket(AF_INET, SOCK_DGRAM);
    var_dump($socket->getOption(SOL_SOCKET, SO_RCVBUF));
    var_dump($socket->getOption(SOL_SOCKET, SO_SNDBUF));
});