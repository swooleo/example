<?php

use Swoole\Coroutine\Channel;

use function Co\run;

run(function () {
    $chan = new Channel(3);

    go(function () use ($chan) {
        $chan->push("a");
    });

    go(function () use ($chan) {
        $chan->push("b");
    });

    var_dump($chan->stats());
});
