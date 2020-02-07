<?php
/*
 * @Author: your name
 * @Date: 2020-01-15 10:33:28
 * @LastEditTime : 2020-02-06 11:07:31
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/server/process_mode.php
 */

use Swoole\Server;

$start = microtime(true);

$serv = new Server("127.0.0.1", 9501);
$serv->set([
    "worker_num" => 1,
    "open_eof_check" => true,
    "package_eof" => "\r\n",
    'open_eof_split' => true // 开启这项，否则Server可能会把多个package合并成一个package
]);

$serv->on('connect', function (Server $serv, $fd) {
    echo "Client:Connect.\n";
});

$serv->on('receive', function (Server $serv, $fd, $reactor_id, $data) use ($start) {
    if ($data === "end\r\n") {
        $end = microtime(true);
        var_dump(($end - $start) * 1000);
    }
});

$serv->on('close', function (Server $serv, $fd) {
    echo "Client: Close.\n";
});

$serv->start();
