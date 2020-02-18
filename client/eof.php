<?php
/*
 * @Author: your name
 * @Date: 2020-01-15 10:58:46
 * @LastEditTime : 2020-02-06 11:20:49
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/client/benchmark.php
 */

use Swoole\Client;

$client = new Client(SWOOLE_TCP);
$client->connect('127.0.0.1', 9501);

for ($i = 0; $i < 3; $i++) {
    $len = rand(1000, 1024 * 128 - 8);
    var_dump($len);
    $client->send(str_repeat('a', $len) . "\r\n");
}

// usleep(1000);
