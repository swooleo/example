<?php

use Swoole\Table;

$table = new Table(10000);

$table->column('age', Table::TYPE_INT);
$table->create();

for ($i = 0; $i < 5000; $i++) {
    $table->set($i, ['age' => $i]);
}

foreach ($table as $key => $value) {
    $table->del($key);
}

var_dump($table->count());
