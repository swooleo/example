<?php

use Swoole\Table;

$table = new Table(10000);

$table->column('age', Table::TYPE_INT);
$table->create();

$table->set('1', ['age' => 10]);
$table->incr('1', 'age', 8);

var_dump($table->get('1'));
