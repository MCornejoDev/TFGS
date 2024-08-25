<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // Definir la relación many-to-many con el modelo User
    public function users()
    {
        // Especificar la tabla pivote 'users_games'
        return $this->belongsToMany(User::class, 'users_games', 'game_id', 'user_id');
    }
}
