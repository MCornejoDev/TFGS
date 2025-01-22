<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date_start',
        'comments',
    ];

    protected $casts = [
        'date_start' => 'date',
    ];

    // Definir la relación many-to-many con el modelo User
    public function users()
    {
        // Especificar la tabla pivote 'users_games'
        return $this->belongsToMany(User::class, 'users_games', 'game_id', 'user_id');
    }

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    protected function dateStart(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $locale = app()->getLocale();

                return match ($locale) {
                    'es' => Carbon::parse($value)->format('d/m/Y'),
                    default => Carbon::parse($value)->format('Y-m-d'),
                };
            },
        );
    }
}
