<?php

use Message\User;
use Swoole\Coroutine\Client;

use function Swoole\Coroutine\run;

require __DIR__ . '/vendor/autoload.php';

run(function () {
    $client = new Client(SWOOLE_TCP);
    $client->connect('127.0.0.1', 9501);

    $user = new User();
    $user->setId(10086);
    $user->setUsername('codinghuang');
    $user->setAge(22);
    $data = $user->serializeToString();

    $client->send($data);
});