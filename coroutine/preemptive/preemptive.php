<?php

ini_set("swoole.enable_preemptive_scheduler","1");

go(function (){
    $exit = false;
    while (true){
        $res = Swoole\Coroutine::stats();
        $num = $res['coroutine_num'];
        if ($num < 10){
            go(function () use(&$exit){
                Swoole\Coroutine::sleep(1);
                $exit = true;
            });
        }
        if ($exit) {            
            break;
        }
    }
    echo "coro exit\n";
});
echo "main end\n";