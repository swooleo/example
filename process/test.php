<?php

/*
 * @Author: your name
 * @Date: 2020-02-25 14:53:37
 * @LastEditTime: 2020-02-26 12:19:27
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/process/test.php
 */

use Swoole\Process;

$process = new Process(function (Process $process) {
    $sock = $process->exportSocket();
    var_dump($sock->fd);
});


$pid = $process->start();

$sock = $process->exportSocket();
var_dump($sock->fd);

$process->write(str_repeat('a', 1024 * 256));

$process->wait();