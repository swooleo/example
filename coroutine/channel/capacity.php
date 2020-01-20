<?php

use Swoole\Coroutine\Channel;

use function Co\run;

run(function () {
    $chan = new Channel(2);
    var_dump($chan->capacity);
});
