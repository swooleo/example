<?php
/*
 * @Author: your name
 * @Date: 2020-01-15 10:58:46
 * @LastEditTime : 2020-02-06 10:50:49
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/client/benchmark.php
 */

use Swoole\Client;

$client = new Client(SWOOLE_TCP);
$client->connect('127.0.0.1', 9501);
for ($i = 0; $i < 2000; $i++) {
    $client->send(str_repeat('a', 1 * 1024 * 1024) . "\r\n");
}

$client->send("end\r\n");
// usleep(1000);
