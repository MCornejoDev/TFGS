<?php

namespace App\Http\Services;

use App\Models\User;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public static function getUser(int $id): ?User
    {
        try {
            return User::findOrFail($id);
        } catch (Exception $e) {
            log_error($e);

            return false;
        }
    }

    public static function remove(int $id): bool
    {
        try {
            return User::findOrFail($id)->delete();
        } catch (Exception $e) {
            log_error($e);

            return false;
        }
    }

    public static function update(int $id, array $data): bool
    {
        try {
            $user = User::findOrFail($id);

            if ($data['avatar'] instanceof UploadedFile) {
                if ($user->avatar) {
                    Storage::disk('public')->delete($user->avatar);
                }
                $user->avatar = self::storeAvatar($data['avatar']);
            }

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->timezone = $data['timezone']['name'];

            return $user->save();
        } catch (Exception $e) {
            log_error($e);

            return false;
        }
    }

    public static function storeAvatar(UploadedFile $avatar): string
    {
        $filename = uniqid() . '.' . $avatar->extension();
        return Storage::disk('public')->putFileAs('images/avatars', $avatar,  $filename);
    }
}
