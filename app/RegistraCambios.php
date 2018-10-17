<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistraCambios extends Model
{
    //
    protected $table = 'cambios';
    protected $fillable = ['nickPartida','fecha','idUsuario','idPersonaje','estado','nivel','fuerza',
    'destreza','constitucion','inteligencia','sabiduria','carisma','objetos'];
    public $timestamps = false;
}
