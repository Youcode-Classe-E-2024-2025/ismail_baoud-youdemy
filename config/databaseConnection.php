<?php


class DatabaseConnection {
    private $host = "localhost";
    private $user = "root";
    private $pass = "baoud";

    private $dbName = "youdemy";
    private $conn;

    public function connect()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbName,
                $this->user,
                $this->pass
            );
            return $this->conn;

        } catch (PDOException $e) {
            die("Connection Error: " . $e->getMessage());
        }
    }
}

