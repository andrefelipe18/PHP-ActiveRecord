<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Models\User;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$user = new User();

