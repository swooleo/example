<?php

use Swoole\Coroutine\Http\Client;

use function Co\run;

run(function () {
    $domain = 'search.gd.gov.cn';
    
    $cli = new Client($domain, 80);
    $cli->get('/jsonp/site/762001?callback=wwefewf');
    var_dump($cli->getBody());
    $cli->close();
});
