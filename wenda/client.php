<?php


Swoole\Coroutine\run(function () {
    $cli = new Swoole\Coroutine\Http\Client('127.0.0.1', 9100, true);
    $cli->get('/');
    var_dump(strlen($cli->body));
    $cli->close();
});
