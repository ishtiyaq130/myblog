<?php

namespace App\Helpers;

class RoleHelper
{
    const ROLES = [
        0 => ['create', 'update', 'list', 'delete'],
        1 => ['edit', 'list', 'publish'],
        2 => ['create', 'edit', 'list', 'publish', 'delete'],
    ];

    public static function can($role, $permission)
    {
        return in_array($permission, self::ROLES[$role] ?? []);
    }
}
