<?php

use Swoole\Coroutine;

use function Swoole\Coroutine\run;

function task1()
{
    task2();
}

function task2()
{
    task3();
}

function task3()
{
    var_dump(Coroutine::getBackTrace(Coroutine::getCid(), DEBUG_BACKTRACE_IGNORE_ARGS));
}

run(function () {
    go(function () {
        task1();
    });
});
