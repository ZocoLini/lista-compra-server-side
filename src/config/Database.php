<?php

namespace config;

use PDO;
use PDOException;

class Database
{
    private static $pdo;

    public static function connect()
    {
        if (!self::$pdo) {
            $host = $_ENV['DB_HOST'];
            $db = $_ENV['DB_NAME'];
            $user = $_ENV['DB_USER'];
            $pass = $_ENV['DB_PASS'];

            $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

            try {
                self::$pdo = new PDO($dsn, $user, $pass);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('conn error: ' . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}