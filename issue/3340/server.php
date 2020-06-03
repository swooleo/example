<?php

Co::set(['hook_flags'=> SWOOLE_HOOK_ALL]);

$pool = new Swoole\Database\RedisPool((new Swoole\Database\RedisConfig)
        ->withHost('host.docker.internal')
        ->withPort(6379)
        ->withAuth('')
        ->withDbIndex(0)
        ->withTimeout(1));


$server = new Swoole\WebSocket\Server("0.0.0.0", 9502, SWOOLE_BASE);

$server->set([
    'worker_num' => 1,
]);

$server->addProcess(new Swoole\Process(function () {
    Co\run(function () {
        for ($i = 0; $i < 100; $i++) {
            $client = new Swoole\Coroutine\Http\Client("127.0.0.1", 9502);
            $ret = $client->upgrade("/");
            if ($ret) {
                $client->push("hello");
                sleep(1);
            }
        }
    });
}));

$server->on('message', function (Swoole\WebSocket\Server $server, $frame) use ($pool) {
    // var_dump('message');
    $server->disconnect($frame->fd);
    $c = $pool->get();
    defer(function () use ($c, $pool) {
        $pool->put($c);
    });
    $c->sadd('mykey', rand());
    $c->srem('mykey', rand());
    $c->keys('*');
    $c->sMembers('mykey');
    $c->sadd('mykey', rand());
    $c->srem('mykey', rand());
    $c->keys('*');
    $c->sMembers('mykey');
    sleep(1);
});

$server->on('close', function ($ser, $fd) use ($pool) {
    // var_dump('close');
    $c = $pool->get();
    defer(function () use ($c, $pool) {
        $pool->put($c);
    });
    $c->sadd('mykey', rand());
    $c->srem('mykey', rand());
    $c->keys('*');
    $c->sMembers('mykey');
    $c->sadd('mykey', rand());
    $c->srem('mykey', rand());
    $c->keys('*');
    $c->sMembers('mykey');
});

$server->start();
