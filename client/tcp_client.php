<?php
/*
 * @Author: your name
 * @Date: 2020-01-15 10:58:46
 * @LastEditTime : 2020-01-18 02:52:14
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/client/client.php
 */

use Swoole\Client;

$client = new Client(SWOOLE_TCP);
$client->connect('127.0.0.1', 9501);
$client->send(str_repeat('a', 1 * 1024 * 1024) . "\r\n");
