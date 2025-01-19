<?php

namespace config;

use PDO;
use PDOException;

class DatabaseConnection {
    private static $host = "localhost";
    private static $user = "root";
    private static $pass = "baoud";
    private static $dbName = "youdemy";

    protected $conn;

    public static function connect()
    {
        try {
            $conn = new PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$dbName,
                self::$user,
                self::$pass
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
