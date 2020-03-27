<?php

register_shutdown_function(function () {
    echo 'shutdown' . PHP_EOL;
});

echo 'execute script' . PHP_EOL;

go(function () {
    throw new Exception;
});