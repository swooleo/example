<?php
/*
 * @Author: your name
 * @Date: 2020-02-07 10:32:30
 * @LastEditTime : 2020-02-07 10:35:12
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/issue/3037.php
 */

use Swoole\Process;
use Swoole\Server;

$server = new Server('127.0.0.1', 9501);

$process = new Process(function ($process) use ($server) {
    while (true) {
        $msg = $process->read();
        foreach ($server->connections as $conn) {
            $server->send($conn, $msg);
        }
    }
});

Process::signal(SIGTERM,[$server, "shutdown"]);
$server->addProcess($process);
$server->on('receive', function ($serv, $fd, $reactor_id, $data) use ($process) {
    $process->write($data);
});

$server->start();
