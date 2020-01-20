<?php

use Swoole\Coroutine\Scheduler;

$sch = new Scheduler;
$sch->parallel(5, function ($param) {
    var_dump($param);
}, 1);
$sch->start();
