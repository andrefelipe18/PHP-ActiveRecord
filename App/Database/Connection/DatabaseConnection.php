<?php

declare(strict_types=1);

namespace App\Database\Connection;

use PDO;
use PDOException;

class DatabaseConnection
{
    private static ?PDO $pdo = null;

    public static function connect(?PDO $testingPDO = null): PDO
    {
        if (self::$pdo === null) {
            try {

               if($testingPDO !== null) {
                   self::$pdo = $testingPDO;
                   return self::$pdo;
               }

                $host = $_ENV['DB_HOST'];
                $db = $_ENV['DB_NAME'];
                $user = $_ENV['DB_USERNAME'];
                $password = $_ENV['DB_PASSWORD'];
                $port = $_ENV['DB_PORT'];

                self::$pdo = new PDO("mysql:host=$host;dbname=$db;port=$port", $user, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

                return self::$pdo;
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }

        return self::$pdo;
    }
}