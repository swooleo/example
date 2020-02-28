<?php
/*
 * @Author: your name
 * @Date: 2020-02-28 04:25:07
 * @LastEditTime: 2020-02-28 04:25:07
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: /swoole/issue/3142.php
 */

define('RUNTIME_PATH', '/tmp');
$http = new Swoole\Http\Server("127.0.0.1", 9501);
$http->set([
	'worker_num' => 1,
	'log_level' => 0,
]);
$http->on('request', function ($request, $response) {
	
});
$http->start();
