<?php

require 'base.php';

$cli = new WebsocketClient;
$connected = $cli->connect('127.0.0.1', 9501, '/');
$response = $cli->sendRecv("shutdown");
echo unpack('n', substr($response, 0, 2))[1] . "\n";
echo substr($response, 2) . "\n";

sleep(1000);