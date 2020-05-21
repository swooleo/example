<?php

use Swoole\Coroutine\Client;

use function Swoole\Coroutine\run;

run(function () {
    /**
     * 
     */
    $flag = 0;
    $client = new Client(SWOOLE_SOCK_TCP);
    reconnect:
    if (!$client->connect('127.0.0.1', 9501)) {
        var_dump($client->errCode, $client->errMsg);
    }
    $data = $client->recv();
    if (empty($data)) {
        if ($flag === 0) {
            $flag += 1;
            goto reconnect;
        }
    }

    
});