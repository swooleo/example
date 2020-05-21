<?php

use Swoole\Client;

$client = new Client(SWOOLE_SOCK_UDP);
if (!$client->sendto('error', 9501, 'hello world')) {
    exit(swoole_strerror($client->errCode));
}