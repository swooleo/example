<?php

Swoole\Coroutine::create(function () {
    $client = new Swoole\Coroutine\Http\Client("unix:///tmp/qot_websocket_server.sock", null, false);
    if ($client->upgrade("/")) {
        while (true) {
            $s = $client->push('hello');
            var_dump($s);
            $client->close();
            break;
        }
    } else {
        echo 3;
    }
});
