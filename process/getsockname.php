<?php

use Swoole\Process;

$process = new Process(function (Process $process) {
    $sock = $process->exportSocket();
    var_dump($sock->getsockname());
});

$pid = $process->start();

$sock = $process->exportSocket();
var_dump($sock->getsockname());