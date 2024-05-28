<?php

use App\Database\Connection\DatabaseConnection;

it('should connect to the database', function () {
    $pdo = Mockery::mock(PDO::class);
    $this->assertNotNull(DatabaseConnection::connect($pdo));
});

it('should return the same connection', function () {
    $pdo = Mockery::mock(PDO::class);
    $this->assertSame(DatabaseConnection::connect($pdo), DatabaseConnection::connect($pdo));
});

it('should return exception when connection fails', function () {
    $this->expectException(PDOException::class);
    DatabaseConnection::connect();
});