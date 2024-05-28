<?php

use App\Database\Connection\DatabaseConnection;

afterEach(function () {
    DatabaseConnection::disconnect();
});

it('should connect to the database', function () {
    $pdo = Mockery::mock(PDO::class);
    $this->assertNotNull(DatabaseConnection::connect($pdo));
});

it('should return the same connection', function () {
    $pdo = Mockery::mock(PDO::class);
    $this->assertSame(DatabaseConnection::connect($pdo), DatabaseConnection::connect($pdo));
});

it('should throw an exception when connecting to the database', function () {
    $this->expectException(PDOException::class);
    $_ENV['DB_HOST'] = 'localhost';
    $_ENV['DB_NAME'] = 'wrong_db_name';
    $_ENV['DB_USERNAME'] = 'root';
    $_ENV['DB_PASSWORD'] = 'root';
    $_ENV['DB_PORT'] = '3306';
    DatabaseConnection::connect();
});

it('should not be able to instantiate the class', function () {
    $reflection = new ReflectionClass(DatabaseConnection::class);
    $this->assertFalse($reflection->isInstantiable());
});

it('should not be able to clone the class', function () {
    $reflection = new ReflectionClass(DatabaseConnection::class);
    $this->assertFalse($reflection->isCloneable());
});