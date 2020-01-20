<?php

use Swoole\Coroutine;
use Swoole\Coroutine\Socket;

use function Swoole\Coroutine\run;

run(function () {
    for ($i=0; $i < 5; $i++) {
        go(function () {
        });
    }

    var_dump(Coroutine::stats()['coroutine_peak_num']);
});