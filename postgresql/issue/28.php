<?php

use function Swoole\Coroutine\run;

run(function () {
    $pg = new Swoole\Coroutine\PostgreSQL();
    $conn = $pg->connect("host=host.docker.internal port=5432 dbname=postgres user=postgres password=123456");
    var_dump($conn, $pg->error);
});
