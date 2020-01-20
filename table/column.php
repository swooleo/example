<?php

use Swoole\Table;

$table = new Table(10000);

$table->column('name', Table::TYPE_STRING, 8);
$table->create();

$table->set('1', ['name' => '123456789']);

foreach ($table as $key => $value) {
    var_dump($value);
}
