<?php
/*
 * @Author: your name
 * @Date: 2020-02-07 06:50:37
 * @LastEditTime : 2020-02-07 07:01:28
 * @LastEditors  : Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /swoole/test/eval.php
 */

echo "start\n";
$code = '
    class Library
    {
        public function func1() {
            echo "codinghuang\n";
        }
    }
';
eval($code);
(new Library)->func1();
echo "end\n";
