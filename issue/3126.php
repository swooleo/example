<?php

use  \Swoole\Coroutine;
use  \Swoole\Coroutine\WaitGroup;
use  \Swoole\Coroutine\Channel;

use function Co\run;

Coroutine::create(function() {
    
    $wg = new WaitGroup();

    $wg->add(1);
    //  第一次打印CoroutineList， 会输出主协程ID（=1）
    foreach(Coroutine::list()  as $key=>$Cid){
        var_dump("进程中正在运行的协程ID:".$Cid);
    }

    Coroutine::create(function()  use($wg) {
        $Cid=Coroutine::getCid();
        var_dump("A.新启动协程ID".$Cid);
        Coroutine::sleep(2);
        var_dump("1");
        $wg->done();
        var_dump("2");
    });

    var_dump("3");
    $wg->wait();  //  等待A协程运行结束
    var_dump("4");
    // Coroutine::sleep(0.1);

    foreach(Coroutine::list()  as $key=>$Cid){
        var_dump("进程中正在运行的协程ID: ".$Cid);   //  这里遍历的时候A协程（ID=2）为什么会被遍历出来？
    }

    $wg->add(1);
    Coroutine::create(function()  use($wg) {
        $Cid=Coroutine::getCid();
        var_dump("B.新启动协程ID".$Cid);
        Coroutine::sleep(2);
        $wg->done();
    });	
    $wg->wait();  //  等待B协程运行结束

    // Coroutine::sleep(0.1);

    foreach(Coroutine::list()  as $key=>$Cid){
        var_dump("进程中正在运行的协程ID: ".$Cid); //  这里遍历的时候B协程（ID=3）为什么会被遍历出来？
    }
});