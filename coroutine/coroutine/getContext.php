<?php

use Swoole\Coroutine;

use function Swoole\Coroutine\run;

function func(callable $fn, ...$args)
{
    go(function () use ($fn, $args) {
        $fn(...$args);
        echo 'Coroutine#' . Coroutine::getCid() . ' exit' . PHP_EOL;
    });
}

/**
 * Compatibility for lower version
 * @param object|Resource $object
 * @return int
 */
function php_object_id($object)
{
    static $id = 0;
    static $map = [];
    $hash = spl_object_hash($object);
    return $map[$hash] ?? ($map[$hash] = ++$id);
}

class Resource
{
    public function __construct()
    {
        echo __CLASS__ . '#' . php_object_id((object)$this) . ' constructed' . PHP_EOL;
    }

    public function __destruct()
    {
        echo __CLASS__ . '#' . php_object_id((object)$this) . ' destructed' . PHP_EOL;
    }
}

run(function () {
    $context = new Coroutine\Context();
    assert($context instanceof ArrayObject);
    assert(Coroutine::getContext() === null);
    func(function () {
        $context = Coroutine::getContext();
        assert($context instanceof Co\Context);
        $context['resource1'] = new Resource;
        $context->resource2 = new Resource;
        func(function () {
            Coroutine::getContext()['resource3'] = new Resource;
            Coroutine::yield();
            Coroutine::getContext()['resource3']->resource4 = new Resource;
            Coroutine::getContext()->resource5 = new Resource;
        });
    });
    Coroutine::resume(3);
});
