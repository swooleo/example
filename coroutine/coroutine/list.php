<?php

use Swoole\Coroutine;

use function Swoole\Coroutine\run;

run(function () {
    go(function () {
        go(function () {
            go(function () {
                go(function () {
                    $coros = Coroutine::list();
                    var_dump($coros);
                    foreach ($coros as $co) {
                        var_dump($co);
                    }
                });
            });
        });
    });
});
