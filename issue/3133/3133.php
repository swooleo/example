<?php

$test_folder = is_dir('/dev/shm/') ? '/dev/shm/' : '/tmp/';
$test_file_path = $test_folder . 'test.txt';
file_put_contents($test_file_path, 'abc');
echo 'test file path used: ', $test_file_path, "\n";

$start_time = microtime(true);
\Swoole\Runtime::enableCoroutine(false);
for ($i = 0; $i < 100000; ++$i) {
    file_get_contents($test_file_path);
}
printf("Coroutine hook disabled: %.2fs\n", microtime(true) - $start_time);

\Swoole\Coroutine::create(function () use ($test_file_path) {
    $start_time = microtime(true);
    \Swoole\Runtime::enableCoroutine(true);
    for ($i = 0; $i < 100000; ++$i) {
        file_get_contents($test_file_path);
    }
    printf("Coroutine hook enabled: %.2fs\n", microtime(true) - $start_time);
});