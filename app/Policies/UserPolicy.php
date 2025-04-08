<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Проверяем, является ли пользователь администратором.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function isAdmin(User $user)
    {
        return $user->role === 'admin'; // или другая логика, если роль хранится по-другому
    }
}
