<?php

use Swoole\Coroutine;
use Swoole\Coroutine\Channel;

use function Swoole\Coroutine\run;

run(function () {
    var_dump('coro run');

    $chan = new Channel(1);
    
    Coroutine::set([
        'exit_condition' => function () use ($chan) {
            return $chan->stats()['consumer_num'] === 0;
        }
    ]);

    $res = $chan->pop();
    var_dump("pop", $res);
});

var_dump("after coro");
