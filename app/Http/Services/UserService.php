<?php

namespace App\Http\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public static function getUser(int $id): ?User
    {
        return User::findOrFail($id);
    }

    public static function remove(int $id): bool
    {
        try {
            return User::find($id)->delete();
        } catch (Exception $e) {
            log_error($e);

            return false;
        }
    }
}
