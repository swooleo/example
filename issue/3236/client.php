<?php

go(function(){
    $client = new \Swoole\Coroutine\Client(SWOOLE_SOCK_UDP);

    $domain = 'error_domain';

    // Error
    var_dump($client->sendto($domain, 9400, json_encode([
        "act"       =>  'submit',
        'msg_id'    =>  1,
    ]))); // false
    var_dump($client);
});
