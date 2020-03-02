<?php
/*
 * @Author: your name
 * @Date: 2020-03-02 03:42:45
 * @LastEditTime: 2020-03-02 04:07:18
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/server/ipv6.php
 */

// telent -6 ::1 9501
// 或者telnet -4 127.0.0.1 9501
// 因为ipv6是包含ipv4的

use Swoole\Server;

$serv = new Server('::', 9501, SWOOLE_PROCESS, SWOOLE_SOCK_TCP6);

$serv->on('Receive', function () {
    
});
$serv->start();