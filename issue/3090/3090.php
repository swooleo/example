<?php
/*
 * @Author: your name
 * @Date: 2020-02-07 10:37:34
 * @LastEditTime : 2020-02-07 11:06:51
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/issue/3090.php
 */
$server = new Swoole\Http\Server("127.0.0.1", 9501, SWOOLE_BASE);
$server->set(array(
    'worker_num' => 4, // The number of worker processes
	'log_level' => 0,
));

$server->on('Request', function ($request, $response) use ($server) {
    $tasks[0] = "hello world";
    $tasks[1] = ['data' => 1234, 'code' => 200];
    $result = $server->taskCo($tasks, 0.5);
    $response->end('Test End, Result: '.var_export($result, true));
});

$server->start();