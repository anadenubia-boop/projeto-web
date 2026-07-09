<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Ana\FdsApp\Infrastructure\Database\Connection;

try {
    $pdo = Connection::getConnection();

    echo '✅ Conexão realizada com sucesso!';
} catch (Throwable $e) {
    echo '❌ Erro: ' . $e->getMessage();
}