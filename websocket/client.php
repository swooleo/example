<?php

use Swoole\Coroutine;
use Swoole\Coroutine\Http\Client;

use function Co\run;

run(function () {
    $cli = new Client("127.0.0.1", 9501);
    $cli->set([
        'timeout' => 1
    ]);
    $ret = $cli->upgrade("/websocket");

    if (!$ret) {
        echo "ERROR\n";
        return;
    }

    $cli->push("websocket handshake 1\n");
    $cli->push("websocket handshake 2\n");
});
