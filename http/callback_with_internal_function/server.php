<?php

use Swoole\Http\Server;

$http = new Server('0.0.0.0', 80, SWOOLE_BASE);
$http->set([
    'worker_num' => 1,
    'log_file' => '/dev/null'
]);
$http->on('request', 'var_dump');
$http->start();