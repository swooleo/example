<?php

use Swoole\Coroutine\Channel;

use function Co\run;

run(function () {
    $chan = new Channel(1);

    go(function () use ($chan) {
        $chan->push('a');
    });

    go(function () use ($chan) {
        $chan->push('a');
    });

    var_dump($chan->length());
});
