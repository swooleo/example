<?php

use Swoole\Coroutine;

use function Swoole\Coroutine\run;

run(function () {
    go(function () {
        var_dump("parent coroutine start");

        Coroutine::defer(function () {
            var_dump("parent coroutine dead");
        });

        go(function () {
            var_dump("child coroutine start");
            Coroutine::sleep(0.01);
            var_dump("child coroutine still running");
        });
    });
});
