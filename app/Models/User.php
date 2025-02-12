<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Definir la relación many-to-many con el modelo Game
    public function games()
    {
        // Especificar la tabla pivote 'users_games'
        return $this->belongsToMany(Game::class, 'users_games', 'user_id', 'game_id');
    }

    public function maps()
    {
        return $this->hasMany(Map::class);
    }

    public function timeZoneLabel(): Attribute
    {
        return Attribute::make(
            get: function () {
                return str_replace('_', ' ', str_replace('/', ' - ', $this->timezone));
            },
        );
    }

    public function avatarLabel(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->avatar ? basename($this->avatar) : __('users.avatars.example');
            },
        );
    }

    public function avatarImage(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->avatar ? asset('storage/' . $this->avatar) : asset('storage/images/example_avatar.jpg');
            },
        );
    }
}
