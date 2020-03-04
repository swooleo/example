<?php
/*
 * @Author: your name
 * @Date: 2020-03-02 04:15:11
 * @LastEditTime: 2020-03-02 04:19:40
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/server/too_many_threads.php
 */

use Swoole\Server;

$serv = new Server('127.0.0.1', 9501);

$serv->set([
    'reactor_num' => swoole_cpu_num() * 100,
]);

$serv->on('Receive', function () {
    
});
$serv->start();