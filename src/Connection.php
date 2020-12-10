<?php

declare(strict_types=1);

namespace App;

use PDO;

class Connection
{
    private static ?PDO $instance = null;

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new PDO(
                "mysql:dbname={$_ENV['DB_NAME']};host={$_ENV['DB_HOST']}",
                $_ENV['DB_USER'],
                $_ENV['DB_PASS']
            );
        }

        return static::$instance;
    }
}
