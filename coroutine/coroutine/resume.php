<?php

use Swoole\Coroutine;

use function Swoole\Coroutine\run;

run(function () {
    $cid = go(function () {
        var_dump(Coroutine::getCid());
        Coroutine::yield();
        var_dump(Coroutine::getCid());
    });

    go(function () use ($cid) {
        var_dump(Coroutine::getCid());
        Coroutine::resume($cid);
        var_dump(Coroutine::getCid());
    });
});
