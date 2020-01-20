<?php

use Swoole\Coroutine\Channel;

use function Co\run;

run(function () {
    $chan = new Channel(1);
    var_dump($chan->isFull());
    $chan->push('a');
    var_dump($chan->isFull());
});
