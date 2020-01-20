<?php

use Swoole\Coroutine\Channel;

use function Co\run;

run(function () {
    $chan = new Channel(1);

    go(function () use ($chan) {
        $ret = $chan->pop(1);
        if (($ret === false) && ($chan->errCode < 0)) {
            var_dump("error");
        } else {
            var_dump("success");
        }
    });
});
