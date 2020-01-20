<?php

use Swoole\Coroutine\Channel;
use Swoole\Server;

$serv = new Server("127.0.0.1", 9501);

$serv->on('start', function ($serv){
    $chan = new Channel();
    go(function () use($chan) {
        $ret = $chan->pop();
        var_dump($ret);
    });
    go(function () use($chan) {
        $chan->push(1);
    });
    echo "Server start.\n";
});

$serv->on('connect', function ($serv, $fd){
    echo "Client:Connect.\n";
});

$serv->on('receive', function ($serv, $fd, $reactor_id, $data) {
    $serv->send($fd, 'Swoole: '.$data);
    $serv->close($fd);
});

$serv->on('close', function ($serv, $fd) {
    echo "Client: Close.\n";
});

$serv->start();
