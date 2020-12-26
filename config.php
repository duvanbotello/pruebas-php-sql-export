<?php

define('ROOT_DIR', dirname(__FILE__));

$db = new MysqliDb (Array (
                'host' => 'localhost',
                'username' => 'root',
                'password' => '',
                'db'=> 'test_database',
                'port' => 3306,
                'prefix' => 'my_',
                'charset' => 'utf8'));
