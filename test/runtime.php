<?php

swoole\runtime::enableCoroutine();

go(function () {
    $fp = stream_socket_client("tcp://www.baidu.com:80", $errno, $errstr, 30);
    if (!$fp) {
        echo "$errstr ($errno)<br />\n";
    } else {
        $http = "GET / HTTP/1.0\r\nAccept: */*User-Agent: Lowell-Agent\r\nHost: www.baidu.com\r\nConnection: Close\r\n\r\n";
        fwrite($fp, $http);
        $content = '';
        while (!feof($fp)) {
            $content .= fread($fp, 1024);
        }
        fclose($fp);
    }
});
swoole_event_wait();