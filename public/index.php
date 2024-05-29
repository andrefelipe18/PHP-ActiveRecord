<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Database\ActiveRecord\FindAll;
use App\Database\ActiveRecord\FindBy;
use App\Models\User;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$user = new User();

$user->name = 'John Doe';
$user->email = 'john@john2.com';

//$user->execute(new \App\Database\ActiveRecord\Insert());
//$user->execute(new Update('id', 1));
//$user->execute(new \App\Database\ActiveRecord\Delete('id', 1));

$users = $user->execute(new FindBy(field: 'id', value: 1, fields: 'name, email', operator: '>'));

var_dump($users);

$users2 = $user->execute(new FindAll(where: ['id' => 1, 'email' => 'john@john2.com'], fields: 'name, email', limit: 1, offset: 1));

echo "<br>";
var_dump($users2);