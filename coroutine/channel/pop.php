<?php

use Swoole\Coroutine\Channel;

use function Co\run;

run(function () {
    $chan = new Channel(1);

    go(function () use ($chan) {
        $ret = $chan->pop(1);
        var_dump($ret);
    });
});
