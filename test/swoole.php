<?php

use Swoole\Coroutine;

$cid1 = go(function () {
    for ($i=0; $i < 1000000; $i++) {
        Coroutine::yield();
    }
});

$cid2 = go(function () {
    for ($i=0; $i < 1000000; $i++) {
        Coroutine::yield();
    }
});

$queue = new SplQueue();
$queue->enqueue($cid1);
$queue->enqueue($cid2);

$start = microtime(true);

for ($i=0; $i < 1000000; $i++) {
    $task = $queue->dequeue();
    Coroutine::resume($task);
    $queue->enqueue($task);
    $task = $queue->dequeue();
    Coroutine::resume($task);
    $queue->enqueue($task);
}

$end = microtime(true);

$diff = $end - $start;

echo "start time: {$start}, end time: {$end}\n";
echo "diff time: {$diff}\n";
