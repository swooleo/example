<?php

ini_set("error_reporting", E_ALL & ~E_DEPRECATED);
ini_set('display_errors', 'On');
// $count = 0;
// while ( true ) {
//     \Swoole\Serialize::unpack(\Swoole\Serialize::pack([
//         'foo' => 'bar'
//     ]));

//     $count ++;
//     if ($count % 1000 === 0) {
//         $count = 0;
//         gc_collect_cycles();
//         echo memory_get_usage() / 1024, "k\n";
//     }
// }

\Swoole\Serialize::unpack(\Swoole\Serialize::pack([
    'foo' => 'bar'
]));

var_dump("here");