<?php

namespace App\Enums;

/**
 *
 */
enum UserPermissions
{
    case see;
    case manage;

    /**
     * Get all rol names
     * @return array
     */
    public static function all(): array
    {
        return [
            self::see->name,
            self::manage->name,
        ];
    }
}
