<?php

use Swoole\Coroutine\Scheduler;

$sch = new Scheduler;
$sch->add(function () {
    var_dump("swoole");
});
$sch->start();