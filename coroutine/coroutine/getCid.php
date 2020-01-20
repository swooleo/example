<?php

use Swoole\Coroutine;

use function Swoole\Coroutine\run;

run(function () {
    var_dump(Coroutine::getCid());
});
