<?php

use function Swoole\Coroutine\run;

Co::set(['hook_flags'=> SWOOLE_HOOK_ALL]);

run(function () {
    $pool = new Swoole\Database\RedisPool((new Swoole\Database\RedisConfig)
    ->withHost('127.0.0.1')
    ->withPort(6379)
    ->withAuth('')
    ->withDbIndex(0)
    ->withTimeout(1));

    while (true) {
        $c = $pool->get();
        var_dump($c);
        sleep(1);
    }
});
