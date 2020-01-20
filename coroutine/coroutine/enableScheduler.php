<?php

use Swoole\Coroutine;

use function Swoole\Coroutine\run;

ini_set("swoole.enable_preemptive_scheduler", "1");

run(function () {
    go(function () {
        Coroutine::enableScheduler();
        while (true) {
        }
    });
    var_dump("swoole");
});
