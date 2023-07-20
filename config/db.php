<?php

$config =  [
    'class' => 'yii\db\Connection',
    'charset' => 'utf8',
    'dsn' => 'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_DATABASE'),
    'username' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),

];



return $config;


