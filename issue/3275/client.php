<?php

use Swoole\Runtime;

// Runtime::enableCoroutine();

// go(function () {
    $context = stream_context_create([
        'socket' => [
            'bindto' => '127.0.0.1:9100',
        ],
    ]);

    echo file_get_contents('http://127.0.0.1:9501', false, $context);
// });s
