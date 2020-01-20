<?php

use Swoole\Coroutine;

use function Swoole\Coroutine\run;

run(function () {
    $cid = go(function () {
        go(function () {
            var_dump(Coroutine::exists(Coroutine::getCid()));
        });
    });

    var_dump(Coroutine::exists($cid));
});
