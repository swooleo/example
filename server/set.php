<?php
/*
 * @Author: your name
 * @Date: 2020-01-14 08:12:25
 * @LastEditTime : 2020-01-14 09:03:54
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/server/set.php
 */

use Swoole\Server;

$serv = new Server("127.0.0.1", 9501);
$serv->set([
    'dispatch_func' => function ($serv, $fd, $type, $data) {
        var_dump($fd, $type, $data);
        return intval($data[0]);
    },
]);
