<?php

use Swoole\Coroutine\Channel;

use function Co\run;

run(function () {
    $chan = new Channel();
    go(function () use ($chan) {
        $chan->pop();
        var_dump($chan->errCode);
    });

    $chan->close();
});
