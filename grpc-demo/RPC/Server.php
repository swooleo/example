<?php

namespace RPC;

use Message\User;
use Swoole\Coroutine\Server as CoroutineServer;
use Swoole\Coroutine\Server\Connection;

class Server extends CoroutineServer
{
    public function __construct($host, $port)
    {
        parent::__construct($host, $port);
    }

    public function handler(Connection $conn)
    {
        while(true) {
            $data = $conn->recv();
            if ($data === '') {
                echo 'the client is disconnected' . PHP_EOL;
                break;
            } else if ($data === false) {
                echo socket_strerror($this->errCode);
            }
            $user = new User();
            $user->mergeFromString($data);
            echo $user->getId() . PHP_EOL;
            echo $user->getAge() . PHP_EOL;
            echo $user->getUsername() . PHP_EOL;
        }
    }

    public function start(): bool
    {
        $this->handle([$this, 'handler']);
        parent::start();
        return true;
    }
}