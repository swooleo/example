<?php

use function Swoole\Coroutine\run;

run(function () {
    $socket = new Swoole\Coroutine\Socket(AF_INET, SOCK_DGRAM, 0);
    $socket->bind('127.0.0.1', 9501);
    $peer = null;
    $ret = $socket->recvfrom($peer);
    var_dump($ret);
    $ret = $socket->recvfrom($peer);
    var_dump($ret);
    echo "DONE\n";
});