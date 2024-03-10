<?php

namespace App;

use PDO;

class DatabaseConnector
{
    public static function makeConnection(): PDO
    {
        return new PDO(
            'mysql:host='.$_ENV['DATABASE_HOST'].';dbname='.$_ENV['DATABASE_NAME'],
            $_ENV['DATABASE_USER'],
            $_ENV['DATABASE_PASSWORD']
        );
    }
}