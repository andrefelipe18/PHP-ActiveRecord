<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Database\ActiveRecord\Update;
use App\Models\User;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$user = new User();

$user->name = 'John Doe';
$user->email = 'john@john2.com';

$user->execute(new \App\Database\ActiveRecord\Insert());
$user->execute(new Update('id', 1));