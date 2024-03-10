<?php

namespace App\Models;

use App\DatabaseConnector;
use PDO;

class BaseModel
{
    protected PDO $pdo;
    protected string $table = '';

    public function __construct()
    {
        $this->connectDb();
    }

    private function connectDb(): void
    {
        $this->pdo = DatabaseConnector::makeConnection();
    }

    public function getAll(): false|array
    {
        return $this->pdo->query('SELECT * FROM '.$this->table)->fetchAll(PDO::FETCH_KEY_PAIR);
    }
}
