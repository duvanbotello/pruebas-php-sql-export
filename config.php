<?php

define('ROOT_DIR', dirname(__FILE__));

$db = new MysqliDb (Array (
                'host' => 'host',
                'username' => 'username',
                'password' => 'password',
                'db'=> 'databaseName',
                'port' => 3306,
                'prefix' => 'my_',
                'charset' => 'utf8'));
