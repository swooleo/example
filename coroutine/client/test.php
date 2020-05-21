<?php

use function Swoole\Coroutine\run;

run(function () {
    $client = new Swoole\Coroutine\Client(SWOOLE_SOCK_TCP);
    var_dump($client->connect('11', 9501, 0.5));
    var_dump($client);
});
