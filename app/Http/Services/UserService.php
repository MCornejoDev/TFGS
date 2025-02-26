<?php

namespace App\Http\Services;

use App\Models\User;
use Exception;
use Hash;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public static function getUsers(string $search, array $filters, string $sortField, string $sortDirection)
    {
        $query = User::query();

        $query->when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        })->when($filters['is_admin'], function ($query) use ($filters) {
            $query->where('is_admin', $filters['is_admin']);
        });

        return $query->orderBy($sortField, $sortDirection);
    }

    public static function getUser(int $id): ?User
    {
        try {
            return User::findOrFail($id);
        } catch (Exception $e) {
            log_error($e);

            return false;
        }
    }

    public static function create(array $data): bool
    {
        try {
            dd($data);
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'timezone' => $data['timezone']['name'],
                'password' => Hash::make($data['password']),
                'is_admin' => $data['is_admin'],
                'email_verified_at' => $data['email_verified_at'] ? now() : null,
            ]);

            if ($data['avatar'] instanceof UploadedFile) {
                $filename = uniqid() . '.' . $data['avatar']->extension();
                $user->avatar = store_file('images/avatars', $data['avatar'], $filename);
            }

            return $user->save();
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
                $filename = uniqid() . '.' . $data['avatar']->extension();
                $user->avatar = store_file('images/avatars', $data['avatar'], $filename);
            }

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->timezone = $data['timezone']['name'];

            if ($data['email_verified_at']) {
                $user->email_verified_at = now();
            }

            return $user->save();
        } catch (Exception $e) {
            log_error($e);

            return false;
        }
    }
}
