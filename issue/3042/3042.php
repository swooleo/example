<?php

use Swoole\Coroutine;
use Swoole\Coroutine\Http\Server;
use Swoole\Event;
use Swoole\Process;
use Swoole\Timer;

$scheduler = new Coroutine\Scheduler();

$handler = function ($signal) {
    echo 'Caught signal: ' . $signal . PHP_EOL;

    Event::exit();
};

$scheduler->add(function () use ($handler) {
    echo 'Starting server ...' . PHP_EOL;
    $server = new Server('127.0.0.1', 3003);
    Process::signal(SIGINT, $handler);
    $server->start();
});

$scheduler->start();
