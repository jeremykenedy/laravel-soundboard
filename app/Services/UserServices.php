<?php

namespace App\Services;

use App\Models\User;

class UserServices
{
    /**
     * Gets the user.
     *
     * @param int $userId The user identifier
     *
     * @return collection The user.
     */
    public static function getUser($userId)
    {
        return User::findOrFail($userId);
    }

    /**
     * Check is user is admin or super admin.
     *
     * @param int $userId The user identifier
     */
    public static function checkIsUserAdminOrHigher($userId)
    {
        $user = self::getUser($userId);
        if (!$user->hasRole(['admin', 'super.admin'])) {
            abort(401);
        }
    }
}
