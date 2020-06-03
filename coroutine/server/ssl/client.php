<?php

use Swoole\Client;

$cli = new Client(SWOOLE_SOCK_TCP | SWOOLE_SSL, SWOOLE_SOCK_SYNC);
$r = $cli->connect('127.0.0.1', 9501);
$cli->send("hello world\n");
$data = $cli->recv(1024);
$cli->close();
var_dump($data);
