<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistraPartida extends Model
{
    //
    protected $table = 'partidas';
    protected $fillable = ['nickPartida','idUsuario','idPersonaje','fechaCreacion','comentarios'];
    public $timestamps = false;
}
