<?php
/*
 * @Author: your name
 * @Date: 2020-01-15 10:58:46
 * @LastEditTime : 2020-01-20 14:36:21
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/client/client.php
 */

use Swoole\Client;

$client = new Client(SWOOLE_TCP);
$client->connect('127.0.0.1', 9100);
$client->send('here');
