<?php
declare(strict_types=1);

namespace Gretex\Backend\Config;

final class Config
{
    public static function string(string $key, string $default = ''): string
    {
        $value = getenv($key);
        return $value === false || $value === '' ? $default : (string)$value;
    }

    public static function int(string $key, int $default): int
    {
        $value = getenv($key);
        if ($value === false || $value === '' || !is_numeric($value)) {
            return $default;
        }

        return (int)$value;
    }

    public static function bool(string $key, bool $default = false): bool
    {
        $value = getenv($key);
        if ($value === false || $value === '') {
            return $default;
        }

        return in_array(strtolower((string)$value), ['1', 'true', 'yes', 'on'], true);
    }

    /**
     * @return list<string>
     */
    public static function csv(string $key, array $default = []): array
    {
        $value = getenv($key);
        if ($value === false || trim((string)$value) === '') {
            return $default;
        }

        $items = array_filter(array_map('trim', explode(',', (string)$value)), static fn (string $item): bool => $item !== '');
        return array_values($items);
    }
}

