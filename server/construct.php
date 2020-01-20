<?php

declare(strict_types=1);

ini_set('log_errors', '1');
ini_set('display_errors', '0');

use Swoole\Server;

$serv = new Server("SYSTEMD");
