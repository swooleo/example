<?php
/*
 * @Author: your name
 * @Date: 2020-01-15 00:20:43
 * @LastEditTime: 2020-01-15 00:20:44
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: /swoole/issue/client.php
 */

use Swoole\Coroutine\Http\Client;
use Swoole\Coroutine\Scheduler;

$scheduler = new Scheduler;
$scheduler->add(function () {
    $client = new Client('127.0.0.1', 9502);
    $client->setMethod('head');
    $client->execute('/index/1');
    var_dump($client);
});
$scheduler->start();