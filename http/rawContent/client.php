<?php
/*
 * @Author: your name
 * @Date: 2020-04-18 02:21:33
 * @LastEditTime: 2020-04-18 02:25:11
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/http/rawContent.php/client.php
 */

use Swoole\Coroutine\Http\Client;

use function Swoole\Coroutine\run;

run(function () {
    $httpClient = new Client('127.0.0.1', 9501, false);
    $httpClient->setMethod("POST");
    $httpClient->setData('hello world');

    $httpClient->execute("/rawContent");
    $httpClient->execute("/getContent");
});