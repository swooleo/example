<?php

use Swoole\Coroutine;

Coroutine\Run(function () {
    $client = new Swoole\Coroutine\Http\Client('www.zhe800.com');

    function foo($ch, $client)
    {
        mt_srand();
        $rand = mt_rand(100000, 999999999);
        $path = "/email_subscribe?email=" . $rand . "@" . substr(md5(microtime(true)), 0, 8) . ".com";
        $client->get($path);
        echo "push is " . $path . " " . Coroutine::getCid() . "\n";
        $client->close();
        $ch->push($path);
    }

    function bar($client)
    {
        $length = 10;
        $ch = new Swoole\Coroutine\Channel($length);
        for ($i = 0; $i < $length; $i++) {
            go('foo', $ch, $client);
        }

        for ($i = 0; $i < $length; $i++) {
            go(function ($ch) {
                $data = $ch->pop(1);
                echo "pop is " . $data . "\n";
            }, $ch);
        }
    }

    bar($client);
});
