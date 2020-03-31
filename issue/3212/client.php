<?php

use function Co\run;

run(function () {
    $client = new \Swoole\Coroutine\Http\Client("127.0.0.1", 9501);
    $client->setHeaders([]);
    $res = $client->upgrade('/');
    var_dump($res);
});
