<?php

use Swoole\Coroutine\Scheduler;

$sch = new Scheduler;
$sch->add(function () {
    var_dump("add");
});
$sch->parallel(2, function () {
    var_dump("parallel");
});
$sch->add(function () {
    var_dump("add");
});
$sch->parallel(3, function () {
    var_dump("parallel");
});
$sch->start();
