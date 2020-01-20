<?php

use Swoole\Table;

$table = new Table(10);

$table->column('age', Table::TYPE_INT);
$table->create();

var_dump($table->size);
