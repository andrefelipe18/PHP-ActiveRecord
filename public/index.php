<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$user = new User();

$user->firstName = 'John';
$user->lastName = 'Doe';
$user->id = 1;

$user->update(new Update());