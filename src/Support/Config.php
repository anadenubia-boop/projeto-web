<?php

declare(strict_types=1);

namespace Ana\FdsApp\Support;

final class Config
{
    private static array $config = [];

    public static function load(string $file): void
    {
        self::$config = require $file;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return self::$config[$key] ?? $default;
    }
}