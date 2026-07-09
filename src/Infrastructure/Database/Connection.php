<?php

declare(strict_types=1);

namespace Ana\FdsApp\Infrastructure\Database;

use PDO;
use PDOException;

final class Connection
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection instanceof PDO) {
            return self::$connection;
        }

        $config = require __DIR__ . '/../../../config/database.php';

        try {
            self::$connection = new PDO(
                sprintf(
                    '%s:host=%s;port=%d;dbname=%s;charset=%s',
                    $config['driver'],
                    $config['host'],
                    $config['port'],
                    $config['database'],
                    $config['charset']
                ),
                $config['username'],
                $config['password'],
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]
            );

            return self::$connection;

        } catch (PDOException $exception) {

            throw new PDOException(
                'Não foi possível conectar ao banco de dados.',
                (int) $exception->getCode(),
                $exception
            );
        }
    }
}