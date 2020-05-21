<?php

// $http = new Swoole\Http\Server("0.0.0.0", 9100, SWOOLE_PROCESS, SWOOLE_SOCK_TCP | SWOOLE_SSL);
// $http->set([
//     // 'document_root' => __DIR__,
//     // 'enable_static_handler' => true,
//     // 'http_autoindex' => true,
//     // 'http_index_files' => ['indes.html'],

//     'ssl_cert_file' => __DIR__ . '/server.crt',
//     'ssl_key_file' => __DIR__ . '/server.key',
//     // 'open_http2_protocol' => true,
// ]);
// $http->on('request', function ($request, $response) {
//     var_dump($request);
//     $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
// });
// $http->start();

use Swoole\Coroutine\Http\Server;

use function Swoole\Coroutine\run;

run(function () {
    $server = new Server("127.0.0.1", 9100, true);
    $server->set(['open_tcp_nodelay' => true,
        'ssl_cert_file' => '/Users/hantaohuang/codeDir/cppCode/swoole-src/tests/include/api/ssl-ca/server-cert.pem',
        'ssl_key_file' => '/Users/hantaohuang/codeDir/cppCode/swoole-src/tests/include/api/ssl-ca/server-key.pem',
    ]);
    $server->handle('/', function ($request, $response) {
        $response->end("<h1>Index</h1>");
    });
    $server->handle('/stop', function ($request, $response) use ($server) {
        $response->end("<h1>Stop</h1>");
        $server->shutdown();
    });
    $server->start();
});
