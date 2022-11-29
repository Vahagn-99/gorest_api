<?php

namespace App\Enums;

/**
 *
 */
trait EnumTool
{
    /**
     * @param array|null $excepts
     * @param bool $as_string
     * @return array|string
     */
    public static function excepts(array $excepts = null, bool $as_string = false): array|string
    {
        $result = [];
        foreach (self::cases() as $role) {
            if (!$excepts || !in_array($role->name, $excepts, true)) {
                $result[] = $role->name;
            }
        }
        return $as_string ? implode('|', $result) : $result;
    }

    /**
     * @param array|null $expects
     * @param bool $as_string
     * @return array|string
     */
    public static function only(array $expects = null, bool $as_string = false): array|string
    {
        $result = [];
        foreach (self::cases() as $role) {
            if (!$expects || in_array($role->name, $expects, true)) {
                $result[] = $role->name;
            }
        }
        return $as_string ? implode('|', $result) : $result;
    }
}
