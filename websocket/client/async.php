<?php

use Swoole\Http\Client;

$cli = new Client('127.0.0.1', 9501);

$cli->on('close', function ($cli) {

});

$cli->on('error', function ($cli) {

});

$cli->on('Message', function ($cli, $frame) {

});

$cli->upgrade('/websocket', function ($cli) {
    for ($i = 0; $i < 100; $i++) {
        $cli->push('hello');
    }
});