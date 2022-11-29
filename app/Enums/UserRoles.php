<?php

namespace App\Enums;

/**
 *
 */
enum UserRoles
{
    use EnumTool;

    case admin;
    case manager;
    case user;

    /**
     * Get all rol names
     * @return array
     */
    public static function all(): array
    {
        return [
            self::admin->name,
            self::manager->name,
            self::user->name
        ];
    }
}
