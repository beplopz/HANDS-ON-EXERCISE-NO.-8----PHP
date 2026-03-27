<?php

declare(strict_types=1);

class Database
{
    private ?PDO $connection = null;

    public function getConnection(): ?PDO
    {
        if ($this->connection instanceof PDO) {
            return $this->connection;
        }

        $host = '127.0.0.1';
        $dbName = 'hands_on_exercise_8';
        $username = 'root';
        $password = '';

        try {
            $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8mb4";
            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (Throwable $exception) {
            $this->connection = null;
        }

        return $this->connection;
    }
}
