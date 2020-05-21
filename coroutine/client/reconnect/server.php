<?php

use Swoole\Server;

$serv = new Server('127.0.0.1', 9501);

$serv->on('Receive', function () {
});

$serv->start();