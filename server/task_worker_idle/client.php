<?php

use Swoole\Client;

$client = new Client(SWOOLE_SOCK_UDP, SWOOLE_SOCK_SYNC);
if (!$client->connect('127.0.0.1', 9501)) {
    exit("connect failed\n");
}
$client->send("ping");
$client->send("ping");
