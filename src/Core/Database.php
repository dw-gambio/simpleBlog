<?php


namespace App\Core;


use PDO;
use PDOException;

class Database extends PDO
{

    public function __construct()
    {
        $dbHost = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $dbUsername = $_ENV['DB_USERNAME'];
        $dbPassword = $_ENV['DB_PASSWORD'];

        try {
            parent::__construct(
                "mysql:host={$dbHost};
                dbname={$dbName}",
                $dbUsername,
                $dbPassword);

        } catch (PDOException $e) {
            echo "Failed to connect to database";
            echo "{$e->getMessage()}";
            die();
        }

        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}
