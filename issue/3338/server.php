<?php

$server = new Swoole\WebSocket\Server("0.0.0.0", 9502);
$server->set([
    'worker_num' => 1,
]);

$server->addProcess(new Swoole\Process(function () {
    Co\run(function () {
        while (true) {
            $client = new Swoole\Coroutine\Http\Client("127.0.0.1", 9502);
            $ret = $client->upgrade("/");
            if ($ret) {
                $client->push("hello");
                co::sleep(1);
            }
        }
    });
}));

$server->on('message', function (Swoole\WebSocket\Server $server, $frame) {
    $id = Co::getCid();
    echo "receive from fd: {$frame->fd} in cid: {$id};\n";
    $server->disconnect($frame->fd);
});

$server->on('close', function ($ser, $fd) {
    sleep(2);
    $id = Co::getCid();
    echo "close fd: {$fd} in cid: {$id}; \n";
});

$server->start();
