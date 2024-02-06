<?php

namespace App\Models;
use PDO;
use PDOException;

class BaseModel
{
    public function getConn(): PDO
    {
        try {
            return new PDO(
                "mysql:host=localhost;dbname=weblab",
                "root",
                "password"
            );
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}