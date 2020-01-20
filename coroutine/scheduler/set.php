<?php

use Swoole\Coroutine\Scheduler;

use function Co\run;

run(function () {
    $sch = new Scheduler;
    $sch->set([]);
});